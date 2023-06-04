<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Transport\Socket;

use Evenement\EventEmitter;
use Phplrt\RPC\Exception\DecodingExceptionInterface;
use Phplrt\RPC\Protocol\DecoderInterface;
use Phplrt\RPC\Protocol\JsonRPCv2;

/**
 * @internal This is an internal class, please do not use it in your application code.
 * @psalm-internal Phplrt\LanguageServer\Transport\Socket
 */
final class MessageEmitter extends EventEmitter
{
    /**
     * Default "Content-Type" header section.
     *
     * @link https://microsoft.github.io/language-server-protocol/specifications/lsp/3.17/specification/#headerPart
     */
    private const DEFAULT_CONTENT_TYPE = 'application/vscode-jsonrpc; charset=utf-8';

    /**
     * @var non-empty-string
     */
    public const EVENT_MESSAGE = 'message';

    /**
     * Current message parsing state.
     *
     * @var State
     */
    private State $state;

    /**
     * Global data buffer.
     *
     * @var string
     */
    private string $buffer = '';

    /**
     * Processed headers.
     *
     * @var array<non-empty-lowercase-string, string>
     */
    private array $headers = [];

    /**
     * Expected content-length of the json data.
     *
     * @var int<0, max>
     */
    private int $expectedContentLength = 0;

    public function __construct(
        private readonly DecoderInterface $decoder = new JsonRPCv2(),
    ) {
        $this->state = State::default();
    }

    /**
     * Push new data chunk into the buffer
     */
    public function push(string $chunk): void
    {
        $this->buffer .= $chunk;

        while ($this->process() > 0);
    }

    /**
     * Process current buffer and emit {@see Message} while buffer
     * has been successfully processed.
     *
     * @return int<0, max> Number of processed messages
     *
     * @throws DecodingExceptionInterface
     */
    private function process(): int
    {
        $messages = 0;
        $buffer = '';

        for ($offset = 0, $length = \strlen($this->buffer); $offset < $length; ++$offset) {
            $buffer .= $this->buffer[$offset];

            switch ($this->state) {
                case State::PARSE_HEADERS:
                    if ($buffer === "\r\n") {
                        /** @psalm-suppress PropertyTypeCoercion */
                        $this->expectedContentLength = (int)(
                            $this->headers['content-length'] ?? 0
                        );

                        $this->freeLocalBuffer($length, $offset, $buffer);
                        $this->nextState();

                        continue 2;
                    }

                    if (\str_ends_with($buffer, "\r\n")) {
                        $parts = \explode(':', $buffer);
                        /** @psalm-suppress PropertyTypeCoercion */
                        $this->headers[\strtolower($parts[0])] = \trim($parts[1] ?? '');

                        $this->freeLocalBuffer($length, $offset, $buffer);
                    }
                    break;

                case State::PARSE_BODY:
                    if (\strlen($buffer) === $this->expectedContentLength) {
                        $this->emitMessageWithBody($buffer);

                        $this->freeLocalBuffer($length, $offset, $buffer);

                        $this->nextState();

                        ++$messages;
                    }
                    break;
            }
        }

        return $messages;
    }

    private function freeLocalBuffer(int &$length, int &$offset, string &$buffer): void
    {
        $this->buffer = \substr($this->buffer, $offset + 1);
        $length = \strlen($this->buffer);

        $offset = -1;
        $buffer = '';
    }

    /**
     * Execute {@see MessageEmitter::emit()} event with
     * parsed content as {@see Message} DTO.
     *
     * @throws DecodingExceptionInterface
     */
    private function emitMessageWithBody(string $body): void
    {
        $this->emit(self::EVENT_MESSAGE, [new Message(
            headers: $this->fetchHeaders(),
            body: $this->decoder->decode($body),
        )]);
    }

    /**
     * @return array<non-empty-lowercase-string, string>
     */
    private function fetchHeaders(): array
    {
        $headers = $this->headers;

        if (!isset($headers['content-type'])) {
            $headers['content-type'] = self::DEFAULT_CONTENT_TYPE;
        }

        try {
            return $headers;
        } finally {
            $this->headers = [];
        }
    }

    /**
     * Apply next state.
     */
    private function nextState(): void
    {
        $this->state = $this->state->next();
    }
}

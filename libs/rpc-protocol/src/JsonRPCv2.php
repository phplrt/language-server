<?php

declare(strict_types=1);

namespace Phplrt\RPC\Protocol;

use Phplrt\RPC\Protocol\Exception\DecodingException;
use Phplrt\RPC\Protocol\Exception\DecodingExceptionInterface;
use Phplrt\RPC\Protocol\Exception\EncodingException;
use Phplrt\RPC\Protocol\Exception\InvalidFieldTypeException;
use Phplrt\RPC\Protocol\Exception\InvalidFieldValueException;
use Phplrt\RPC\Protocol\Exception\RequiredFieldNotDefinedException;
use Phplrt\RPC\Protocol\JsonRPC\Signature;
use Phplrt\RPC\Message\FailureResponseInterface;
use Phplrt\RPC\Message\IdFactory;
use Phplrt\RPC\Message\IdFactoryInterface;
use Phplrt\RPC\Message\IdInterface;
use Phplrt\RPC\Message\MessageInterface;
use Phplrt\RPC\Message\NotificationInterface;
use Phplrt\RPC\Message\RequestFactory;
use Phplrt\RPC\Message\RequestFactoryInterface;
use Phplrt\RPC\Message\RequestInterface;
use Phplrt\RPC\Message\ResponseFactory;
use Phplrt\RPC\Message\ResponseFactoryInterface;
use Phplrt\RPC\Message\ResponseInterface;
use Phplrt\RPC\Message\SuccessfulResponseInterface;

final class JsonRPCv2 implements EncoderInterface, DecoderInterface
{
    /**
     * - JSON_BIGINT_AS_STRING: This flag adds support for converting large
     *   numbers to strings. Such problems can arise, for example, if the
     *   code runs on the x86 platform and receives an int64 message
     *   identifier.
     */
    public const DEFAULT_JSON_FLAGS_DECODE = \JSON_BIGINT_AS_STRING;

    /**
     * - JSON_UNESCAPED_UNICODE: This flag allows UTF chars instead "\x0000"
     *   sequences which greatly reduces the amount of transmitted information
     *   in case unicode sequences are transmitted.
     */
    public const DEFAULT_JSON_FLAGS_ENCODE = \JSON_UNESCAPED_UNICODE;

    /**
     * @var int<1, 2147483647>
     */
    public const DEFAULT_JSON_DEPTH = 64;

    /**
     * @param int-mask-of<\JSON_*> $jsonEncodingFlags
     * @param int-mask-of<\JSON_*> $jsonDecodingFlags
     * @param int<1, 2147483647> $jsonMaxDepth
     */
    public function __construct(
        private readonly RequestFactoryInterface $requests = new RequestFactory(),
        private readonly ResponseFactoryInterface $responses = new ResponseFactory(),
        private readonly IdFactoryInterface $ids = new IdFactory(),
        private readonly Signature $signature = Signature::ALL,
        private readonly int $jsonEncodingFlags = self::DEFAULT_JSON_FLAGS_ENCODE,
        private readonly int $jsonDecodingFlags = self::DEFAULT_JSON_FLAGS_DECODE,
        private readonly int $jsonMaxDepth = self::DEFAULT_JSON_DEPTH,
    ) {
    }

    /**
     * Converts JSON-RPC message into the JSON string.
     *
     * @throws EncodingException
     */
    public function encode(MessageInterface $message): string
    {
        $data = match (true) {
            $message instanceof RequestInterface => [
                'id' => $message->getId()->toPrimitive(),
                'method' => $message->getMethod(),
                'params' => $message->getParameters(),
            ],
            $message instanceof NotificationInterface => [
                'method' => $message->getMethod(),
                'params' => $message->getParameters(),
            ],
            $message instanceof FailureResponseInterface => [
                'id' => $message->getId()->toPrimitive(),
                'error' => [
                    'code' => $message->getErrorCode(),
                    'message' => $message->getErrorMessage(),
                    'data' => $message->getErrorData(),
                ],
            ],
            $message instanceof SuccessfulResponseInterface => [
                'id' => $message->getId()->toPrimitive(),
                'result' => $message->getResult(),
            ],
            default => throw new \InvalidArgumentException(
                \sprintf('Unsupported message type: %s', $message::class),
            ),
        };

        if ($this->signature->shouldInsert()) {
            $data['jsonrpc'] = '2.0';
        }

        return $this->toJson($data);
    }

    /**
     * Converts variant payload into json string.
     */
    private function toJson(array $data): string
    {
        try {
            return \json_encode($data, \JSON_THROW_ON_ERROR | $this->jsonEncodingFlags, $this->jsonMaxDepth);
        } catch (\Throwable $e) {
            throw EncodingException::fromInternalEncodingError($e->getMessage(), (int)$e->getCode());
        }
    }

    /**
     *
     *
     * @throws DecodingExceptionInterface
     */
    public function decode(string $data): MessageInterface
    {
        $array = $this->fromJson($data);

        if ($this->signature->shouldValidate()) {
            if (!\array_key_exists('jsonrpc', $array)) {
                throw RequiredFieldNotDefinedException::fromField('jsonrpc');
            }

            if ($array['jsonrpc'] !== '2.0') {
                throw InvalidFieldValueException::fromValueOfField('jsonrpc', '"2.0"', $array['jsonrpc']);
            }
        }

        // Check "method" field existing
        if (\array_key_exists('method', $array)) {
            return $this->tryDecodeRequest($array);
        }

        return $this->tryDecodeResponse($array);
    }

    private function fromJson(string $json): array
    {
        try {
            $flags = \JSON_THROW_ON_ERROR | $this->jsonDecodingFlags;

            return (array)\json_decode($json, true, $this->jsonMaxDepth, $flags);
        } catch (\Throwable $e) {
            throw DecodingException::fromInternalDecodingError($e->getMessage(), (int)$e->getCode());
        }
    }

    /**
     * @param array{
     *  id?: mixed,
     *  method: mixed,
     *  params?: mixed,
     * } $data
     *
     * @throws DecodingException
     */
    private function tryDecodeRequest(array $data): NotificationInterface
    {
        // The "method" must be a string
        if (!\is_string($data['method']) || $data['method'] === '') {
            throw InvalidFieldTypeException::fromTypeOfField('method', 'non-empty-string', $data['method']);
        }

        // The "params" required
        if (!\array_key_exists('params', $data)) {
            $data['params'] = [];
        }

        // The "params" must be an array or object
        if (!\is_object($data['params']) && !\is_array($data['params'])) {
            throw InvalidFieldTypeException::fromTypeOfField('params', 'array|object', $data['params']);
        }

        if (\array_key_exists('id', $data)) {
            return $this->requests->createRequest(
                method: $data['method'],
                parameters: $data['params'],
                id: $this->tryDecodeId($data['id']),
            );
        }

        return $this->requests->createNotification(
            method: $data['method'],
            parameters: (array)$data['params'],
        );
    }

    /**
     * @throws DecodingException
     */
    private function tryDecodeId(mixed $id): IdInterface
    {
        return match (true) {
            $id === '' => throw InvalidFieldTypeException::fromTypeOfField('id', 'non-empty-string', $id),
            \is_string($id) => $this->ids->createFromString($id),
            \is_int($id) => $this->ids->createFromInt($id),
            default => throw InvalidFieldTypeException::fromTypeOfField('id', 'int|string', $id),
        };
    }

    /**
     * @param array{
     *  id?: mixed,
     *  result?: mixed,
     *  error?: mixed | array{
     *      code?: mixed,
     *      message?: mixed,
     *      data?: mixed
     *  }
     * } $data
     *
     * @return ResponseInterface
     *
     * @throws DecodingException
     */
    private function tryDecodeResponse(array $data): ResponseInterface
    {
        // The "id" required
        if (!\array_key_exists('id', $data)) {
            throw RequiredFieldNotDefinedException::fromField('id');
        }

        if (\array_key_exists('error', $data)) {
            return $this->tryDecodeErrorResponse($data);
        }

        return $this->tryDecodeSuccessResponse($data);
    }

    /**
     * @param array{
     *  id: mixed,
     *  error: mixed | array{
     *      code?: mixed,
     *      message?: mixed,
     *      data?: mixed
     *  }
     * } $data
     *
     * @throws DecodingException
     */
    private function tryDecodeErrorResponse(array $data): FailureResponseInterface
    {
        // The "error" must be an object
        if (!\is_array($data['error'])) {
            throw InvalidFieldTypeException::fromTypeOfField('error', 'object', $data['error']);
        }

        // The "error.code" must be an int
        if (\array_key_exists('code', $data['error']) && !\is_int($data['error']['code'])) {
            throw InvalidFieldTypeException::fromTypeOfField('error.code', 'int', $data['error']['code']);
        }

        // The "error.message" must be a string
        if (\array_key_exists('message', $data['error']) && !\is_string($data['error']['message'])) {
            throw InvalidFieldTypeException::fromTypeOfField('error.message', 'string', $data['error']['message']);
        }

        return $this->responses->createFailure(
            id: $this->tryDecodeNullableId($data),
            code: $data['error']['code'] ?? 0,
            message: $data['error']['message'] ?? '',
            data: $data['error']['data'] ?? null,
        );
    }

    /**
     * @throws DecodingException
     */
    private function tryDecodeNullableId(mixed $id): IdInterface
    {
        if ($id === null) {
            return $this->ids->createEmpty();
        }

        return $this->tryDecodeId($id);
    }

    /**
     * @param array{
     *  id: mixed,
     *  result?: mixed
     * } $data
     *
     * @throws DecodingException
     */
    private function tryDecodeSuccessResponse(array $data): SuccessfulResponseInterface
    {
        return $this->responses->createSuccess(
            id: $this->tryDecodeId($data['id']),
            result: $data['result'] ?? null,
        );
    }
}

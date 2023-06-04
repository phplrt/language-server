<?php

declare(strict_types=1);

namespace App;

use Phplrt\LanguageServer\Connection\ConnectionInterface;
use Phplrt\LanguageServer\Protocol\CodeLensOptions;
use Phplrt\LanguageServer\Protocol\CodeLensParams;
use Phplrt\LanguageServer\Protocol\DidChangeTextDocumentParams;
use Phplrt\LanguageServer\Protocol\DidCloseTextDocumentParams;
use Phplrt\LanguageServer\Protocol\DidOpenTextDocumentParams;
use Phplrt\LanguageServer\Protocol\InitializeParams;
use Phplrt\LanguageServer\Protocol\InitializeResult;
use Phplrt\LanguageServer\Protocol\ServerCapabilities;
use Phplrt\LanguageServer\Protocol\ServerInfo;
use Phplrt\LanguageServer\Protocol\TextDocumentSyncKind;
use Phplrt\LanguageServer\Protocol\Type\CodeLens;
use Phplrt\LanguageServer\Protocol\Type\Command;
use Phplrt\LanguageServer\Protocol\Type\Position;
use Phplrt\LanguageServer\Protocol\Type\Range;
use Phplrt\LanguageServer\ServerInterface;
use Phplrt\RPC\Dispatcher\Attribute\RpcMethod;
use Psr\Log\LoggerInterface;

final class Server implements ServerInterface
{
    /**
     * @var array<string, string>
     */
    private array $documents = [];

    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly ConnectionInterface $connection,
    ) {
    }

    #[RpcMethod]
    public function initialize(InitializeParams $initialize): InitializeResult
    {
        $this->logger->info(__FUNCTION__, [$initialize]);

        return new InitializeResult(
            capabilities: new ServerCapabilities(
                textDocumentSync: TextDocumentSyncKind::FULL,
                codeLensProvider: new CodeLensOptions(
                    resolveProvider: true,
                ),
            ),
            serverInfo: new ServerInfo(
                name: 'Example Language Server',
                version: '0.0.1',
            ),
        );
    }

    #[RpcMethod]
    public function initialized(): void
    {
        $this->logger->info(__FUNCTION__);
    }

    #[RpcMethod(name: 'textDocument/codeLens')]
    public function codeLens(CodeLensParams $params): array
    {
        $this->logger->info(__FUNCTION__, [$params]);

        $text = $this->documents[$params->textDocument->uri] ?? '';
        $result = [];

        foreach (\explode("\n", $text) as $i => $line) {
            if (\trim($line) === '') {
                continue;
            }

            $result[] = new CodeLens(
                range: new Range(
                    start: new Position($i, 0),
                    end: new Position($i, 120),
                ),
                command: new Command(
                    title: 'Hello from "' . \trim($line) . '"',
                    command: 'hello',
                    arguments: [],
                ),
            );
        }

        return $result;
    }

    #[RpcMethod(name: 'textDocument/didOpen')]
    public function onOpen(DidOpenTextDocumentParams $open): void
    {
        $this->logger->info(__FUNCTION__, [$open]);

        $this->documents[$open->textDocument->uri] = $open->textDocument->text;
    }

    #[RpcMethod(name: 'textDocument/didChange')]
    public function onChange(DidChangeTextDocumentParams $change): void
    {
        $this->logger->info(__FUNCTION__, [$change]);

        foreach ($change->contentChanges as $entry) {
            $this->documents[$change->textDocument->uri] = $entry->text;
        }
    }

    #[RpcMethod(name: 'textDocument/didClose')]
    public function onClose(DidCloseTextDocumentParams $data): void
    {
        $this->logger->info(__FUNCTION__, [$data]);

        unset($this->documents[$data->textDocument->uri]);
    }
}

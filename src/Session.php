<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer;

use Psr\Log\LoggerInterface;
use Phplrt\LanguageServer\Connection\ConnectionInterface;
use Phplrt\LanguageServer\Protocol\CodeLens;
use Phplrt\LanguageServer\Protocol\CodeLensOptions;
use Phplrt\LanguageServer\Protocol\CodeLensParams;
use Phplrt\LanguageServer\Protocol\Command;
use Phplrt\LanguageServer\Protocol\DidChangeTextDocumentParams;
use Phplrt\LanguageServer\Protocol\DidCloseTextDocumentParams;
use Phplrt\LanguageServer\Protocol\DidOpenTextDocumentParams;
use Phplrt\LanguageServer\Protocol\InitializeParams;
use Phplrt\LanguageServer\Protocol\InitializeResult;
use Phplrt\LanguageServer\Protocol\Position;
use Phplrt\LanguageServer\Protocol\Range;
use Phplrt\LanguageServer\Protocol\ServerCapabilities;
use Phplrt\LanguageServer\Protocol\ServerInfo;
use Phplrt\LanguageServer\Protocol\TextDocumentSyncKind;
use Phplrt\LanguageServer\RPC\Attribute\RpcMethod;
use Phplrt\LanguageServer\RPC\AttributeAwareDispatcher;
use Phplrt\LanguageServer\RPC\DispatcherInterface;
use Phplrt\LanguageServer\RPC\Hydrator\ExtractorInterface;
use Phplrt\LanguageServer\RPC\Hydrator\HydratorInterface;
use Phplrt\LanguageServer\RPC\Message\FailureResponseInterface;
use Phplrt\LanguageServer\RPC\Message\NotificationInterface;
use Phplrt\LanguageServer\RPC\Message\RequestInterface;
use Phplrt\LanguageServer\RPC\Message\SuccessfulResponseInterface;

final class Session
{
    public readonly DispatcherInterface $dispatcher;

    /**
     * @var array<string, string>
     */
    private array $documents = [];

    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly ConnectionInterface $connection,
        HydratorInterface $hydrator,
        ExtractorInterface $extractor,
    ) {
        $this->dispatcher = new AttributeAwareDispatcher(
            context: $this,
            hydrator: $hydrator,
            extractor: $extractor,
        );

        $this->subscribe();
    }

    private function subscribe(): void
    {
        $this->connection->onRequest(function (RequestInterface $request) {
            $this->logger->info(' -> call [' . $request->getId() . '] ' . $request->getMethod());

            $response = $this->dispatcher->dispatchMethod($request);

            if ($response instanceof SuccessfulResponseInterface) {
                $this->connection->success($response);
                $this->logger->info(' <- result [' . $request->getId() . ']');
            }

            if ($response instanceof FailureResponseInterface) {
                $this->connection->error($response);
                $this->logger->info(' <- error [' . $request->getId() . '] ' . $response->getErrorMessage());
            }
        });

        $this->connection->onNotification(function (NotificationInterface $notice) {
            $this->logger->info(' -> notify ' . $notice->getMethod());

            $response = $this->dispatcher->dispatchProcedure($notice);

            if ($response instanceof FailureResponseInterface) {
                $this->connection->error($response);
            }
        });
    }

    #[RpcMethod]
    public function initialize(InitializeParams $initialize): InitializeResult
    {
        return new InitializeResult(
            capabilities: new ServerCapabilities(
                textDocumentSync: TextDocumentSyncKind::FULL,
                codeLensProvider: new CodeLensOptions(
                    resolveProvider: true,
                ),
            ),
            serverInfo: new ServerInfo(
                name: 'PHPLRT Example Language Server',
                version: '0.0.1',
            ),
        );
    }

    #[RpcMethod]
    public function initialized(): void
    {
        // No-op
    }

    #[RpcMethod(name: 'textDocument/codeLens')]
    public function codeLens(CodeLensParams $params): array
    {
        return [
            new CodeLens(
                range: new Range(
                    start: new Position(0, 0),
                    end: new Position(0, 120),
                ),
                command: new Command(
                    title: 'Hello From LSP',
                    command: 'hello',
                    arguments: [],
                ),
            )
        ];
    }

    #[RpcMethod(name: 'textDocument/didOpen')]
    public function onOpen(DidOpenTextDocumentParams $open): void
    {
        $this->documents[$open->textDocument->uri] = $open->textDocument->text;
    }

    #[RpcMethod(name: 'textDocument/didChange')]
    public function onChange(DidChangeTextDocumentParams $change): void
    {
        foreach ($change->contentChanges as $entry) {
            $this->documents[$change->textDocument->uri] = $entry->text;
        }
    }

    #[RpcMethod(name: 'textDocument/didClose')]
    public function onClose(DidCloseTextDocumentParams $data): void
    {
        unset($this->documents[$data->textDocument->uri]);
    }
}

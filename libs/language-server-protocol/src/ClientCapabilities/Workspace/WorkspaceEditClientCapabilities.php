<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace;

use Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace\WorkspaceEdit\ResourceOperationKind;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace\WorkspaceEdit\FailureHandlingKind;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace\WorkspaceEdit\WorkspaceEditChangeAnnotationSupport;
use Phplrt\LanguageServer\Protocol\Type\WorkspaceEdit;

final class WorkspaceEditClientCapabilities
{
    /**
     * @param ?bool $documentChanges The client supports versioned document
     *        changes in {@see WorkspaceEdit}s
     * @param ?list<ResourceOperationKind> $resourceOperations The resource
     *        operations the client supports. Clients should at least support
     *        'create', 'rename' and 'delete' files and folders.
     *        - {@since 3.13.0}
     * @param ?FailureHandlingKind $failureHandling The failure handling
     *        strategy of a client if applying the workspace edit fails.
     *        - {@since 3.13.0}
     * @param ?bool $normalizesLineEndings Whether the client normalizes line
     *        endings to the client specific setting. If set to {@see true} the
     *        client will normalize line ending characters in a workspace edit
     *        to the client-specified new line character.
     *        - {@since 3.16.0}
     * @param ?WorkspaceEditChangeAnnotationSupport $changeAnnotationSupport
     *        Whether the client in general supports change annotations on text
     *        edits, create file, rename file and delete file changes.
     *        - {@since 3.16.0}
     */
    public function __construct(
        public readonly ?bool $documentChanges = null,
        public readonly ?array $resourceOperations = null,
        public readonly ?FailureHandlingKind $failureHandling = null,
        public readonly ?bool $normalizesLineEndings = null,
        public readonly ?WorkspaceEditChangeAnnotationSupport $changeAnnotationSupport = null,
    ) {}
}

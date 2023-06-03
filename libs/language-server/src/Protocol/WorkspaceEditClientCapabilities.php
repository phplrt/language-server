<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

final class WorkspaceEditClientCapabilities
{
    /**
     * @param bool|null $documentChanges The client supports versioned document
     *        changes in `WorkspaceEdit`s
     * @param list<ResourceOperationKind>|null $resourceOperations The resource
     *        operations the client supports. Clients should at least support
     *        'create', 'rename' and 'delete' files and folders.
     *        @since 3.13.0
     * @param FailureHandlingKind|null $failureHandling The failure handling
     *        strategy of a client if applying the workspace edit fails.
     *        @since 3.13.0
     * @param bool|null $normalizesLineEndings Whether the client normalizes
     *        line endings to the client specific setting.
     *
     *        If set to `true` the client will normalize line ending characters
     *        in a workspace edit to the client-specified new line character.
     *        @since 3.16.0
     * @param ChangeAnnotationSupport|null $changeAnnotationSupport Whether the
     *        client in general supports change annotations on text edits, create
     *        file, rename file and delete file changes.
     *        @since 3.16.0
     */
    public function __construct(
        public readonly ?bool $documentChanges = null,
        public readonly ?array $resourceOperations = null,
        public readonly ?FailureHandlingKind $failureHandling = null,
        public readonly ?bool $normalizesLineEndings = null,
        public readonly ?ChangeAnnotationSupport $changeAnnotationSupport = null,
    ) {
    }
}

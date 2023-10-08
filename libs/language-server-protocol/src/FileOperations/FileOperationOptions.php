<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\FileOperations;

/**
 * Options for notifications/requests for user operations on files.
 *
 * @since 3.16.0
 */
final class FileOperationOptions
{
    /**
     * @param ?FileOperationRegistrationOptions $didCreate The server is interested in
     *        receiving didCreateFiles notifications.
     * @param ?FileOperationRegistrationOptions $willCreate The server is interested in
     *        receiving willCreateFiles requests.
     * @param ?FileOperationRegistrationOptions $didRename The server is interested in
     *        receiving didRenameFiles notifications.
     * @param ?FileOperationRegistrationOptions $willRename The server is interested in
     *        receiving willRenameFiles requests.
     * @param ?FileOperationRegistrationOptions $didDelete The server is interested in
     *        receiving didDeleteFiles file notifications.
     * @param ?FileOperationRegistrationOptions $willDelete The server is interested in
     *        receiving willDeleteFiles file requests.
     */
    public function __construct(
        public readonly ?FileOperationRegistrationOptions $didCreate = null,
        public readonly ?FileOperationRegistrationOptions $willCreate = null,
        public readonly ?FileOperationRegistrationOptions $didRename = null,
        public readonly ?FileOperationRegistrationOptions $willRename = null,
        public readonly ?FileOperationRegistrationOptions $didDelete = null,
        public readonly ?FileOperationRegistrationOptions $willDelete = null,
    ) {}
}

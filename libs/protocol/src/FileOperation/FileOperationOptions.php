<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\FileOperation;

/**
 * Options for notifications/requests for user operations on files.
 *
 * @since 3.16.0
 */
final class FileOperationOptions
{
    /**
     * @param FileOperationRegistrationOptions|null $didCreate The server is
     *        interested in receiving didCreateFiles notifications.
     * @param FileOperationRegistrationOptions|null $willCreate The server is
     *        interested in receiving willCreateFiles requests.
     * @param FileOperationRegistrationOptions|null $didRename The server is
     *        interested in receiving didRenameFiles notifications.
     * @param FileOperationRegistrationOptions|null $willRename The server is
     *        interested in receiving willRenameFiles requests.
     * @param FileOperationRegistrationOptions|null $didDelete The server is
     *        interested in receiving didDeleteFiles file notifications.
     * @param FileOperationRegistrationOptions|null $willDelete The server is
     *        interested in receiving willDeleteFiles file requests.
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

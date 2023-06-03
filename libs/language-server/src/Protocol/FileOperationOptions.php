<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * Options for notifications/requests for user operations on files.
 *
 * @since 3.16.0
 */
final class FileOperationOptions
{
    public function __construct(
        public readonly ?FileOperationRegistrationOptions $didCreate = null,
        public readonly ?FileOperationRegistrationOptions $willCreate = null,
        public readonly ?FileOperationRegistrationOptions $didRename = null,
        public readonly ?FileOperationRegistrationOptions $willRename = null,
        public readonly ?FileOperationRegistrationOptions $didDelete = null,
        public readonly ?FileOperationRegistrationOptions $willDelete = null,
    ) {
    }
}

<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\FileOperation;

/**
 * Capabilities relating to events from file operations by the user in the
 * client.
 *
 * These events do not come from the file system, they come from user operations
 * like renaming a file in the UI.
 *
 * @since 3.16.0
 */
final class FileOperationClientCapabilities
{
    /**
     * @param bool|null $dynamicRegistration Whether the client supports dynamic
     *        registration for file requests/notifications.
     * @param bool|null $didCreate The client has support for sending
     *        didCreateFiles notifications.
     * @param bool|null $willCreate The client has support for sending
     *        willCreateFiles requests.
     * @param bool|null $didRename The client has support for sending
     *        didRenameFiles notifications.
     * @param bool|null $willRename The client has support for sending
     *        willRenameFiles requests.
     * @param bool|null $didDelete The client has support for sending
     *       didDeleteFiles notifications.
     * @param bool|null $willDelete The client has support for sending
     *       willDeleteFiles requests.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?bool $didCreate = null,
        public readonly ?bool $willCreate = null,
        public readonly ?bool $didRename = null,
        public readonly ?bool $willRename = null,
        public readonly ?bool $didDelete = null,
        public readonly ?bool $willDelete = null,
    ) {}
}

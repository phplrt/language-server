<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\WorkspaceFolder;

final class WorkspaceFoldersServerCapabilities
{
    /**
     * @param bool|null $supported The server has support for workspace folders.
     * @param bool|string|null $changeNotifications Whether the server wants to
     *        receive workspace folder change notifications.
     *
     *        If a string is provided the string is treated as an ID under which
     *        the notification is registered on the client side. The ID can be
     *        used to unregister for these events using the
     *        `client/unregisterCapability` request.
     */
    public function __construct(
        public readonly ?bool $supported = null,
        public readonly bool|string|null $changeNotifications = null,
    ) {}
}

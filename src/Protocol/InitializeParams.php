<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

final class InitializeParams extends WorkDoneProgressParams
{
    /**
     * @param int|null $processId The process ID of the parent process that
     *        started the server.
     *
     *        Is `null` if the process has not been started by another process.
     *        If the parent process is not alive then the server should exit.
     * @param ClientInfo|null $clientInfo Information about the client.
     * @param non-empty-string|null $locale The locale the client is currently
     *        showing the user interface in. This must not necessarily be the
     *        locale of the operating system.
     *
     *        Uses IETF language tags as the value's syntax:
     *        {@see https://en.wikipedia.org/wiki/IETF_language_tag}.
     *        @since 3.16.0
     * @param non-empty-string|null $rootPath The {@see $rootPath} of the
     *        workspace. Is {@see null} if no folder is open.
     *        @deprecated in favour of {@see $rootUri}.
     * @param non-empty-string|null $rootUri The {@see $rootUri} of the workspace.
     *        Is {@see null} if no folder is open. If both {@see $rootPath} and
     *        {@see $rootUri} are set {@see $rootUri} wins.
     *        @deprecated in favour of {@see $workspaceFolders}.
     * @param ClientCapabilities $capabilities The capabilities provided by the
     *        client (editor or tool).
     * @param mixed $initializationOptions User provided initialization options.
     * @param TraceValues $trace The initial trace setting.
     * @param list<WorkspaceFolder>|null $workspaceFolders The workspace folders
     *        configured in the client when the server starts.
     *
     *        This property is only available if the client supports workspace
     *        folders. It can be {@see null} if the client supports workspace
     *        folders but none are configured.
     *        @since 3.6.0
     * @param int|non-empty-string|null $progressToken An optional token that a
     *        server can use to report work done progress.
     */
    public function __construct(
        public readonly ?int $processId = null,
        public readonly ?ClientInfo $clientInfo = null,
        public readonly ?string $locale = null,
        public readonly ?string $rootPath = null,
        public readonly ?string $rootUri = null,
        public readonly ClientCapabilities $capabilities = new ClientCapabilities(),
        public readonly mixed $initializationOptions = null,
        public readonly TraceValues $trace = TraceValues::OFF,
        public readonly ?array $workspaceFolders = null,
        int|string|null $progressToken = null,
    ) {
        parent::__construct($progressToken);
    }
}

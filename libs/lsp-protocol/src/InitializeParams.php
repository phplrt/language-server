<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

use Phplrt\LanguageServer\Protocol\InitializeParams\InitializeParamsClientInfo;
use Phplrt\LanguageServer\Protocol\Experimental\TraceValues;
use Phplrt\LanguageServer\Protocol\Type\WorkspaceFolder;
use Phplrt\LanguageServer\Protocol\WorkspaceFolder\WorkspaceFoldersInitializeParams;

/**
 * The initialize parameters
 */
class InitializeParams extends WorkspaceFoldersInitializeParams implements
    WorkDoneProgressParams
{
    use WorkDoneProgressParamsProvider;

    /**
     * @param int<-2147483648, 2147483647>|null $processId The process ID of the
     *        parent process that started the server.
     *        Is {@see null} if the process has not been started by another
     *        process. If the parent process is not alive then the server should
     *        exit.
     *       - {@since 3.15.0}
     * @param ?InitializeParamsClientInfo $clientInfo Information about the client.
     * @param ?string $locale The locale the client is currently showing the
     *        user interface in. This must not necessarily be the locale of the
     *        operating system.
     *        Uses IETF language tags as the value's syntax:
     *        - {@link https://en.wikipedia.org/wiki/IETF_language_tag}
     *        - {@since 3.16.0}
     * @param string|null $rootPath The rootPath of the workspace. Is {@see null}
     *        if no folder is open.
     *        - {@deprecated in favour of rootUri}.
     * @param string|null $rootUri The rootUri of the workspace. Is {@see null}
     *        if no folder is open. If both {@see $rootPath} and {@see $rootUri}
     *        are set {@see $rootUri} wins.
     *        - {@deprecated in favour of workspaceFolders}.
     * @param ClientCapabilities $capabilities The capabilities provided by the
     *        client (editor or tool)
     * @param mixed $initializationOptions User provided initialization options.
     * @param ?TraceValues $trace The initial trace setting. If omitted trace is
     *        disabled ('off').
     * @param list<WorkspaceFolder>|null $workspaceFolders The workspace folders
     *        configured in the client when the server starts.
     *         This property is only available if the client supports workspace
     *        folders. It can be {@see null} if the client supports workspace folders but
     *        none are configured.
     *        - {@since 3.6.0}
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     *        An optional token that a server can use to report work done progress.
     */
    public function __construct(
        public int|null $processId,
        public ?InitializeParamsClientInfo $clientInfo = null,
        public ?string $locale = null,
        public string|null $rootPath = null,
        public string|null $rootUri = null,
        public ClientCapabilities $capabilities = new ClientCapabilities(),
        public mixed $initializationOptions = null,
        public ?TraceValues $trace = null,
        array|null $workspaceFolders = null,
        int|string|null $workDoneToken = null,
    ) {
        parent::__construct($workspaceFolders);

        $this->workDoneToken = $workDoneToken;
    }
}

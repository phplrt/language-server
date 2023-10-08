<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Diagnostic;

use Phplrt\LanguageServer\Protocol\PartialResultParams;
use Phplrt\LanguageServer\Protocol\PartialResultParamsProvider;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParams;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParamsProvider;

/**
 * Parameters of the workspace diagnostic request.
 *
 * @since 3.17.0
 */
final class WorkspaceDiagnosticParams implements
    WorkDoneProgressParams,
    PartialResultParams
{
    use WorkDoneProgressParamsProvider;
    use PartialResultParamsProvider;

    /**
     * @param ?string $identifier The additional identifier provided during
     *        registration.
     * @param list<PreviousResultId> $previousResultIds The currently known
     *        diagnostic reports with their previous result ids.
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     *        An optional token that a server can use to report work done progress.
     * @param int<-2147483648, 2147483647>|string|null $partialResultToken
     *        An optional token that a server can use to report partial results
     *        (e.g. streaming) to the client.
     */
    public function __construct(
        public readonly ?string $identifier = null,
        public readonly array $previousResultIds = [],
        int|string|null $workDoneToken = null,
        int|string|null $partialResultToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
        $this->partialResultToken = $partialResultToken;
    }
}

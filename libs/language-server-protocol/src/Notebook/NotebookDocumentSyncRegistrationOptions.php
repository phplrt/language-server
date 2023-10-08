<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

use Phplrt\LanguageServer\Protocol\StaticRegistrationOptions;
use Phplrt\LanguageServer\Protocol\StaticRegistrationOptionsProvider;
use Phplrt\LanguageServer\Protocol\Notebook\NotebookDocumentSyncOptionsNotebookSelector;

/**
 * Registration options specific to a notebook.
 *
 * @since 3.17.0
 */
final class NotebookDocumentSyncRegistrationOptions extends NotebookDocumentSyncOptions implements
    StaticRegistrationOptions
{
    use StaticRegistrationOptionsProvider;

    /**
     * @param list<NotebookDocumentSyncOptionsNotebookSelector> $notebookSelector
     *        The notebooks to be synced
     * @param ?bool $save Whether save notification should be forwarded to the server.
     *        Will only be honored if mode === {@see $notebook}.
     * @param ?string $id The id used to register the request. The id can be
     *        used to deregister the request again. See also Registration#id.
     */
    public function __construct(
        array $notebookSelector,
        ?bool $save = null,
        ?string $id = null,
    ) {
        $this->id = $id;

        parent::__construct($notebookSelector, $save);
    }
}

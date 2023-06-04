<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * Options specific to a notebook plus its cells to be synced to the server.
 *
 * If a selector provides a notebook document filter but no cell selector all
 * cells of a matching notebook document will be synced.
 *
 * If a selector provides no notebook document filter but only a cell selector
 * all notebook document that contain at least one matching cell will be synced.
 *
 * @since 3.17.0
 */
final class NotebookDocumentSyncOptions
{
    /**
     * @param list<NotebookSelector> $notebookSelector The notebooks to be
     *        synced.
     * @param bool|null $save Whether save notification should be forwarded to
     *        the server. Will only be honored if "$mode === `notebook`".
     */
    public function __construct(
        public readonly array $notebookSelector = [],
        public readonly ?bool $save = null,
    ) {}
}

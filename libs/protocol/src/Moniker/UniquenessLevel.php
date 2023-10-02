<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Moniker;

/**
 * Moniker uniqueness level to define scope of the moniker.
 *
 * @since 3.16.0
 */
enum UniquenessLevel: string
{
    /**
     * The moniker is only unique inside a document
     */
    case DOCUMENT = 'document';

    /**
     * The moniker is unique inside a project for which a dump got created
     */
    case PROJECT = 'project';

    /**
     * The moniker is unique inside the group to which a project belongs
     */
    case GROUP = 'group';

    /**
     * The moniker is unique inside the moniker scheme.
     */
    case SCHEME = 'scheme';

    /**
     * The moniker is globally unique
     */
    case GLOBAL = 'global';
}

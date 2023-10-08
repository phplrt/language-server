<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Twig;

abstract class MixinsFilterCallback
{
    /**
     * @var list<non-empty-string>
     */
    protected const MIXINS = [
        'StaticRegistrationOptions',
        'TextDocumentRegistrationOptions',
        'WorkDoneProgressOptions',
        'WorkDoneProgressParams',
        'PartialResultParams',
    ];
}

<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Progress;

enum WorkDoneProgressKind: string
{
    case BEGIN = 'begin';
    case REPORT = 'report';
    case END = 'end';
}

<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

use Phplrt\LanguageServer\Protocol\Type\SignatureHelp;

/**
 * Additional information about the context in which a signature help request was
 * triggered.
 *
 * @since 3.15.0
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class SignatureHelpContext
{
    /**
     * @param SignatureHelpTriggerKind $triggerKind Action that caused signature help
     *        to be triggered.
     * @param ?string $triggerCharacter Character that caused signature help
     *        to be triggered.
     *         This is undefined when `triggerKind !==
     *        SignatureHelpTriggerKind.TriggerCharacter`
     * @param bool $isRetrigger {@see true} if signature help was already showing when it
     *        was triggered.
     *         Retriggers occurs when the signature help is already active and can be
     *        caused by actions such as typing a trigger character, a cursor move, or
     *        document content changes.
     * @param ?SignatureHelp $activeSignatureHelp The currently active `SignatureHelp`.
     *         The {@see $activeSignatureHelp} has its `SignatureHelp.activeSignature` field
     *        updated based on the user navigating through available signatures.
     */
    public function __construct(
        public readonly SignatureHelpTriggerKind $triggerKind,
        public readonly ?string $triggerCharacter = null,
        public readonly bool $isRetrigger,
        public readonly ?SignatureHelp $activeSignatureHelp = null,
    ) {}
}

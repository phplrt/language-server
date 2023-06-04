<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * Signature help represents the signature of something callable. There can be
 * multiple signature but only one active and only one active parameter.
 */
final class SignatureHelp
{
    /**
     * @param list<SignatureInformation> $signatures One or more signatures.
     * @param int<0, max>|null $activeSignature The active signature. If omitted
     *        or the value lies outside the range of {@see $signatures} the
     *        value defaults to zero or is ignored if the {@see SignatureHelp}
     *        has no signatures.
     *
     *        Whenever possible implementors should make an active decision
     *        about the active signature and shouldn't rely on a default value.
     *
     *        In future version of the protocol this property might become
     *        mandatory to better express this.
     * @param int<0, max>|null $activeParameter The active parameter of the
     *        active signature. If omitted or the value lies outside the range
     *        of `signatures[activeSignature].parameters` defaults to 0 if the
     *        active signature has parameters. If the active signature has no
     *        parameters it is ignored.
     *        In future version of the protocol this property might become
     *        mandatory to better express the active parameter if the active
     *        signature does have any.
     */
    public function __construct(
        public readonly array $signatures,
        public readonly ?int $activeSignature,
        public readonly ?int $activeParameter,
    ) {}
}

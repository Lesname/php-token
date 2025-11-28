<?php

declare(strict_types=1);

namespace LesToken\Signer;

use Override;
use RuntimeException;
use LesToken\Signer\Key\Key;

final class RsaSigner extends AbstractSigner
{
    public function __construct(
        private readonly Key $keyPrivate,
        private readonly Key $keyPublic,
        string $algorithm,
    ) {
        parent::__construct($algorithm);
    }

    #[Override]
    public function sign(string $data): string
    {
        $success = openssl_sign(
            $data,
            $signature,
            (string)$this->keyPrivate,
            $this->getAlgorithm(),
        );

        if ($success === false) {
            throw new RuntimeException();
        }

        /** @psalm-suppress TypeDoesNotContainType */
        if (!is_string($signature)) {
            throw new RuntimeException();
        }

        return $signature;
    }

    #[Override]
    public function verify(string $data, string $signature): bool
    {
        return openssl_verify(
            $data,
            $signature,
            (string)$this->keyPublic,
            $this->getAlgorithm(),
        ) === 1;
    }

    #[Override]
    public function getEncryptionName(): string
    {
        return 'rsa';
    }
}

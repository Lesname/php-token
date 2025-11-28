<?php

declare(strict_types=1);

namespace LesToken\Signer;

use Override;

abstract class AbstractSigner implements Signer
{
    public function __construct(protected readonly string $algorithm)
    {}

    #[Override]
    public function getAlgorithm(): string
    {
        return $this->algorithm;
    }
}

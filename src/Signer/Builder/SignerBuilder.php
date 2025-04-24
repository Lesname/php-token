<?php
declare(strict_types=1);

namespace LesToken\Signer\Builder;

use LesToken\Signer\Signer;

interface SignerBuilder
{
    /**
     * @param array<mixed> $config
     */
    public function build(array $config): Signer;
}

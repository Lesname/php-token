<?php

declare(strict_types=1);

namespace LesToken\Signer\Key\Builder;

use LesToken\Signer\Key\Key;

interface KeyBuilder
{
    /**
     * @param array<mixed> $config
     */
    public function build(array $config): Key;
}

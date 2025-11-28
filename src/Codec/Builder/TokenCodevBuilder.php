<?php

declare(strict_types=1);

namespace LesToken\Codec\Builder;

use LesToken\Codec\TokenCodec;

interface TokenCodevBuilder
{
    /**
     * @param array<mixed> $config
     */
    public function build(array $config): TokenCodec;
}

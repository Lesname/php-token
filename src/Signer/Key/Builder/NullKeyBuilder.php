<?php
declare(strict_types=1);

namespace LesToken\Signer\Key\Builder;

use LesToken\Signer\Key\Key;
use LesToken\Signer\Key\NullKey;

final class NullKeyBuilder implements KeyBuilder
{
    public function build(array $config): Key
    {
        return new NullKey();
    }
}

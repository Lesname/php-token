<?php
declare(strict_types=1);

namespace LesToken\Signer\Key\Builder;

use LesToken\Signer\Key\FileKey;
use LesToken\Signer\Key\Key;

final class FileKeyBuilder implements KeyBuilder
{
    /**
     * @param array<mixed> $config
     */
    public function build(array $config): Key
    {
        assert(is_string($config['file']));

        return new FileKey($config['file']);
    }
}

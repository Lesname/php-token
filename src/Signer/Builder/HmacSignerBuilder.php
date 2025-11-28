<?php

declare(strict_types=1);

namespace LesToken\Signer\Builder;

use Override;
use LesToken\Signer\HmacSigner;
use LesToken\Signer\Key\KeyHelper;
use LesToken\Signer\Signer;

final class HmacSignerBuilder implements SignerBuilder
{
    /**
     * @param array<mixed> $config
     */
    #[Override]
    public function build(array $config): Signer
    {
        assert(is_array($config['key']));
        $key = KeyHelper::fromConfig($config['key']);

        assert(is_string($config['algorithm']));

        return new HmacSigner($key, $config['algorithm']);
    }
}

<?php
declare(strict_types=1);

namespace LesToken\Signer\Builder;

use LesToken\Signer\Key\KeyHelper;
use LesToken\Signer\RsaSigner;
use LesToken\Signer\Signer;

final class RsaSignerBuilder implements SignerBuilder
{
    /**
     * @param array<mixed> $config
     */
    public function build(array $config): Signer
    {
        assert(is_array($config['keyPrivate']));
        $keyPrivate = KeyHelper::fromConfig($config['keyPrivate']);

        assert(is_array($config['keyPublic']));
        $keyPublic = KeyHelper::fromConfig($config['keyPublic']);

        assert(is_string($config['algorithm']));

        return new RsaSigner(
            $keyPrivate,
            $keyPublic,
            $config['algorithm'],
        );
    }
}

<?php
declare(strict_types=1);

namespace LesToken\Codec\Builder;

use LesToken\Codec\JwtTokenCodec;
use LesToken\Codec\TokenCodec;
use LesToken\Signer\SignerHelper;

final class JwtTokenCodevBuilder implements TokenCodevBuilder
{
    /**
     * @param array<mixed> $config
     */
    public function build(array $config): TokenCodec
    {
        assert(is_array($config['signer']));
        $signer = SignerHelper::fromConfig($config['signer']);

        return new JwtTokenCodec($signer);
    }
}

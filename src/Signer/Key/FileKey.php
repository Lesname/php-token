<?php
declare(strict_types=1);

namespace LesToken\Signer\Key;

use RuntimeException;

/**
 * @psalm-immutable
 */
final class FileKey implements Key
{
    public function __construct(private readonly string $file)
    {}

    /**
     * @psalm-suppress ImpureFunctionCall
     */
    public function __toString(): string
    {
        if (!file_exists($this->file)) {
            throw new RuntimeException("File {$this->file} does not exist");
        }

        if (!is_readable($this->file)) {
            throw new RuntimeException("File {$this->file} is not readable");
        }

        $contents = file_get_contents($this->file);

        if (false === $contents) {
            throw new RuntimeException("Reading {$this->file} failed");
        }

        return $contents;
    }
}

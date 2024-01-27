<?php

declare(strict_types=1);

namespace App\Domain\LinkStorage;

class Link
{
    public function __construct(
        public readonly string $id,
    )
    {
    }
}

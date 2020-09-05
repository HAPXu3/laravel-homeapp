<?php
declare(strict_types = 1);

namespace App\Domains\Common;

use Ramsey\Uuid\Uuid;

final class UUIDIdentifier extends Identifier
{
    public function __construct(string $uuid)
    {
        if (!$this->uuidValidation($uuid)) {
            throw new \InvalidArgumentException('UUID is invalid');
        }

        $this->value = $uuid;
    }

    private function uuidValidation(string $uuid): bool
    {
        return Uuid::isValid($uuid);
    }
}

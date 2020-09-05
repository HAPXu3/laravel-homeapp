<?php
declare(strict_types = 1);

namespace App\Domains\Common;

abstract class Identifier
{
    protected $value;

    public function __toString()
    {
        return strval($this->value);
    }
}

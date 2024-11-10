<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Foundation\Configuration\Exceptions;

class Handler
{
    public function __invoke(Exceptions $exceptions): Exceptions
    {
        return $exceptions;
    }
}

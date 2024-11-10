<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Foundation\Configuration\Middleware;

class Handler
{
    public function __invoke(Middleware $middleware): Middleware
    {
        return $middleware;
    }
}

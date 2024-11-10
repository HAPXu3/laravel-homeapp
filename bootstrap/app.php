<?php

use App\Console\Handler as ScheduleHandler;
use App\Exceptions\Handler as ExceptionsHandler;
use App\Http\Middleware\Handler as MiddlewareHandler;
use Illuminate\Foundation\Application;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        apiPrefix: '',
    )
    ->withMiddleware(new MiddlewareHandler())
    ->withExceptions(new ExceptionsHandler())
    ->withSchedule(new ScheduleHandler())
    ->withCommands([__DIR__ . '/../app/Console/Commands'])
    ->create();

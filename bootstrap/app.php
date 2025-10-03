<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        apiPrefix: 'api/admin',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware -> alias ([
            'admin' => \App\Http\Middleware\Admin::class,
            'force.https' => \App\Http\Middleware\ForceHttps::class,
        ]);
        
        // Force HTTPS globally in production
        if (app()->environment('production')) {
            $middleware->web(append: [
                \App\Http\Middleware\ForceHttps::class,
            ]);
        }
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

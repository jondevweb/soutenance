<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\CorsMiddleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Middleware\HandleInertiaRequests;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    // ->withMiddleware(function (Middleware $middleware) {
    //     $middleware->alias([
    //         'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
    //         'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
    //         'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class
    //     ]);
    // })  
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->web(append: [
        //     HandleInertiaRequests::class,
        // ]);
        // $middleware->redirectGuestsTo('/');
     
        // // Using a closure...
        // $middleware->redirectGuestsTo(fn (Request $request) => route('welcome'));
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->respond(function (Response $response) {
            if ($response->getStatusCode() === 404) {
                return redirect()->route('welcome');
            }
        });
    })->create();

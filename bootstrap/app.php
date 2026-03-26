<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AgeCheck;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\AdminMiddleware;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //**global */
        //$middleware->append(AgeCheck::class);

        //**group    */

        // $middleware->appendToGroup("ageCheck",[
        //     AgeCheck::class,
            
        // ]);

        // $middleware->appendToGroup("checkRole",[
        // CheckRole::class,
         
        // ]);

        $middleware->alias([
            'auth.admin' => AdminMiddleware::class,
            // 'auth' => AuthMiddleware::class

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {

        $exceptions->render(function (RouteNotFoundException $e, Request $request) {
            return response()->json(['error' => 'You do not have permission to access this path'], 401);
        });
    })->create();

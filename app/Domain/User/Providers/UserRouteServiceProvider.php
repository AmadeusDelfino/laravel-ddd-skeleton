<?php


namespace App\Domain\User\Providers;

use App\Domain\User\Http\Middleware\AuthenticatedMiddleware;
use App\Infrastructure\Providers\RouteModuleServiceProvider;

class UserRouteServiceProvider extends RouteModuleServiceProvider
{
    # Preenhcer com o namespace dos controllers do módulo
    protected $namespace = 'App\Domain\User\Http\Controllers';
    protected $routeFilePath = __DIR__ . '/../Http/routes.php';
    # Preencher com o prefixo das urls do módulo
    protected $prefix = 'users';
    # Preencher com os middlewares das rotas do módulo
    protected $middlewares = [
        'auth' => AuthenticatedMiddleware::class,
    ];
}

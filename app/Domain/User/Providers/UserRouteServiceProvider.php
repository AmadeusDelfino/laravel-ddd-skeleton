<?php


namespace App\Domain\User\Providers;

use App\Infrastructure\Providers\RouteModuleServiceProvider;

class UserRouteServiceProvider extends RouteModuleServiceProvider
{
    # Preenhcer com o namespace dos controllers do módulo
    protected $namespace = 'App\Domain\User\Http\Controllers';
    protected $routeFilePath = __DIR__ . '/../Http/routes.php';
    # Preencher com o prefixo das urls do módulo
    protected $prefix = 'user';
    # Preencher com os middlewares das rotas do módulo
    protected $middlewares = [];
}

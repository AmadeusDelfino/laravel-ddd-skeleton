<?php


namespace App\Module\Auth\Providers;

use App\Infrastructure\Providers\RouteModuleServiceProvider;

class AuthRouteServiceProvider extends RouteModuleServiceProvider
{
    # Preenhcer com o namespace dos controllers do módulo
    protected $namespace = 'App\Module\Auth\Http\Controllers';
    protected $routeFilePath = __DIR__ . '/../Http/routes.php';
    # Preencher com o prefixo das urls do módulo
    protected $prefix = 'auth';
    # Preencher com os middlewares das rotas do módulo
    protected $middlewares = [];
}

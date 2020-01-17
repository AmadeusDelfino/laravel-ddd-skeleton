<?php


namespace App\Module\Acl\Providers;

use App\Infrastructure\Providers\RouteModuleServiceProvider;

class AclRouteServiceProvider extends RouteModuleServiceProvider
{
    # Preenhcer com o namespace dos controllers do módulo
    protected $namespace = 'App\Module\Acl\Http\Controllers';
    protected $routeFilePath = __DIR__ . '/../Http/routes.php';
    # Preencher com o prefixo das urls do módulo
    protected $prefix = 'acl';
    # Preencher com os middlewares das rotas do módulo
    protected $middlewares = [];
}

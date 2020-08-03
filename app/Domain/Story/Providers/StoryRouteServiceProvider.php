<?php


namespace App\Domain\Story\Providers;

use App\Infrastructure\Providers\RouteModuleServiceProvider;

class StoryRouteServiceProvider extends RouteModuleServiceProvider
{
    # Preenhcer com o namespace dos controllers do módulo
    protected $namespace = 'App\Domain\Story\Http\Controllers';
    protected $routeFilePath = __DIR__ . '/../Http/routes.php';
    # Preencher com o prefixo das urls do módulo
    protected $prefix = 'stories';
    # Preencher com os middlewares das rotas do módulo
    protected $middlewares = [];
}

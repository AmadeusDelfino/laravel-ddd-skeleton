<?php


namespace App\Domain\Foo\Providers;

use App\Infrastructure\Providers\RouteModuleServiceProvider;

class RouteServiceProvider extends RouteModuleServiceProvider
{
    protected $namespace = 'App\Domain\Foo\Http\Controllers';
    protected $routeFilePath = __DIR__ . '/../Http/routes.php';
    protected $prefix = 'foo';
    protected $middlewares = [
        'api',
    ];
}

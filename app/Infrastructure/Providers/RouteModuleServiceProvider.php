<?php


namespace App\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

abstract class RouteModuleServiceProvider extends RouteServiceProvider
{
    protected $prefix = '';
    protected $routeFilePath = '';
    protected $middlewares = [];

    public function map()
    {
        Route::prefix($this->prefix)
            ->middleware($this->middlewares)
            ->namespace($this->namespace)
            ->group($this->routeFilePath);
    }
}

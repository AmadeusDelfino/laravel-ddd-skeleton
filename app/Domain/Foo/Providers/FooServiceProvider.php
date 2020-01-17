<?php


namespace App\Domain\Foo\Providers;

use App\Domain\Foo\Contracts\FooService;
use App\Infrastructure\Providers\ModuleServiceProvider;

class FooServiceProvider extends ModuleServiceProvider
{
    protected $moduleName = 'foo';

    public $bindings = [
        FooService::class => \App\Domain\Foo\Services\FooService::class,
    ];

    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->mergeConfigFrom(__DIR__ . '/../config.php', $this->moduleName);
        $this->loadMigrationsFrom(__DIR__ . '/../Migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../Translations', $this->moduleName);
    }
}

<?php


namespace App\Module\Auth\Providers;

use App\Infrastructure\Providers\ModuleServiceProvider;

class AuthServiceProvider extends ModuleServiceProvider
{
    protected $moduleName = 'auth';

    # Preencher com os binds interface -> classe concreta
    public $bindings = [

    ];

    public function register()
    {
        $this->app->register(AuthRouteServiceProvider::class);
        $this->app->register(AuthEventServiceProvider::class);
        $this->mergeConfigFrom(__DIR__ . '/../config.php', $this->moduleName);
        $this->loadMigrationsFrom(__DIR__ . '/../Migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../Translations', $this->moduleName);
    }
}

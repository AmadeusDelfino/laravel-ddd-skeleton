<?php


namespace App\Domain\User\Providers;

use App\Infrastructure\Providers\ModuleServiceProvider;

class UserServiceProvider extends ModuleServiceProvider
{
    protected $moduleName = 'user';

    # Preencher com os binds interface -> classe concreta
    public $bindings = [

    ];

    public function register()
    {
        $this->app->register(UserRouteServiceProvider::class);
        $this->app->register(UserEventServiceProvider::class);
        $this->mergeConfigFrom(__DIR__ . '/../config.php', $this->moduleName);
        $this->loadMigrationsFrom(__DIR__ . '/../Migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../Translations', $this->moduleName);
    }
}

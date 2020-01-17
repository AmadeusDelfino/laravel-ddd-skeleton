<?php


namespace App\Module\Acl\Providers;

use App\Infrastructure\Providers\ModuleServiceProvider;

class AclServiceProvider extends ModuleServiceProvider
{
    protected $moduleName = 'acl';

    # Preencher com os binds interface -> classe concreta
    public $bindings = [

    ];

    public function register()
    {
        $this->app->register(AclRouteServiceProvider::class);
        $this->app->register(AclEventServiceProvider::class);
        $this->mergeConfigFrom(__DIR__ . '/../config.php', $this->moduleName);
        $this->loadMigrationsFrom(__DIR__ . '/../Migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../Translations', $this->moduleName);
    }
}

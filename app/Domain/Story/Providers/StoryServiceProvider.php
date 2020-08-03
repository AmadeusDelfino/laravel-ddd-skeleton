<?php


namespace App\Domain\Story\Providers;

use App\Infrastructure\Providers\ModuleServiceProvider;

class StoryServiceProvider extends ModuleServiceProvider
{
    protected $moduleName = 'story';

    # Preencher com os binds interface -> classe concreta
    public $bindings = [

    ];

    public function register()
    {
        $this->app->register(StoryRouteServiceProvider::class);
        $this->app->register(StoryEventServiceProvider::class);
        $this->mergeConfigFrom(__DIR__ . '/../config.php', $this->moduleName);
        $this->loadMigrationsFrom(__DIR__ . '/../Migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../Translations', $this->moduleName);
    }
}

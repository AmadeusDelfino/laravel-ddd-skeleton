<?php

namespace App\Application\Providers;

use App\Application\Commands\GenerateCommand;
use App\Application\Commands\GenerateMiddleware;
use App\Application\Commands\GenerateMigration;
use App\Application\Commands\GenerateModule;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateModule::class,
                GenerateMigration::class,
                GenerateMiddleware::class,
                GenerateCommand::class,
            ]);
        }
    }
}

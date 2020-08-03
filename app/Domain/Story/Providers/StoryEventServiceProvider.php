<?php


namespace App\Domain\Story\Providers;


use App\Infrastructure\Providers\EventModuleServiceProvider;

class StoryEventServiceProvider extends EventModuleServiceProvider
{
    # Preencher com os listeners do módulo
    protected $listen = [];
}

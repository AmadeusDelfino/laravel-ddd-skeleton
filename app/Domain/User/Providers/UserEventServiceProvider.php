<?php


namespace App\Domain\User\Providers;


use App\Infrastructure\Providers\EventModuleServiceProvider;

class UserEventServiceProvider extends EventModuleServiceProvider
{
    # Preencher com os listeners do módulo
    protected $listen = [];
}

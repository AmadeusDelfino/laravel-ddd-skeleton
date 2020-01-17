<?php


namespace App\Module\Acl\Providers;


use App\Infrastructure\Providers\EventModuleServiceProvider;

class AclEventServiceProvider extends EventModuleServiceProvider
{
    # Preencher com os listeners do módulo
    protected $listen = [];
}

<?php


namespace App\Domain\Foo\Providers;

use App\Infrastructure\Providers\EventModuleServiceProvider;

class EventServiceProvider extends EventModuleServiceProvider
{
    protected $listen = [];
}

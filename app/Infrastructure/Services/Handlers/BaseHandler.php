<?php


namespace App\Infrastructure\Services\Handlers;


use Illuminate\Support\Facades\Validator;

abstract class BaseHandler
{
    protected $events = [];
    protected $rules = [];

    protected function fireEvents($values): void {
        collect($this->events)->each(static function ($event) use ($values) {
            event(new $event($values));
        });
    }

    protected function validate(array $arguments = []): void {
        Validator::make($arguments, $this->rules)->validate();
    }
}

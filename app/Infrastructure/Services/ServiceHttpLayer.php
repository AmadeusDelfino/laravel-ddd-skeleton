<?php


namespace App\Infrastructure\Services;

use App\Infrastructure\Responses\HttpResponse;

class ServiceHttpLayer
{
    protected $service;

    public function __construct(string $service)
    {
        $this->service = new $service();
    }

    public function __call($name, $arguments): HttpResponse
    {
        try {
            return $this->process($this->service->{$name}(...$arguments), 200);
        } catch (\Exception $e) {
            return $this->process($e->getMessage(), 500);
        }


    }

    protected function process($data, $code = 200): HttpResponse
    {
        return new HttpResponse($data, $code);
    }
}

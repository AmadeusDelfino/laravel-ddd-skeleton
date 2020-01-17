<?php


namespace App\Infrastructure\Services;


use App\Application\Exceptions\ServiceHandlerNotFound;

abstract class Service
{
    protected $handlers = [];

    /**
     * @param $name
     * @param $arguments
     * @return  mixed
     * @throws ServiceHandlerNotFound
     */
    public function __call($name, $arguments)
    {
        if (!key_exists($name, $this->handlers)) {
            throw new ServiceHandlerNotFound('Service handler not found: ' . $name);
        }

        return (new $this->handlers[$name])(...$arguments);
    }
}

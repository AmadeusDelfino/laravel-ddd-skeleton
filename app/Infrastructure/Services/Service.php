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
        if (!array_key_exists($name, $this->handlers)) {
            throw new ServiceHandlerNotFound('Service handler not found: ' . $name);
        }

        if(!is_callable($this->handlers[$name])) {
            throw new \RuntimeException('Service handler ' . $name . ' is not callable');
        }

        return (new $this->handlers[$name])(...$arguments);
    }
}

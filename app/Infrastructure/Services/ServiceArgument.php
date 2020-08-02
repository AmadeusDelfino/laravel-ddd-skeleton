<?php


namespace App\Infrastructure\Services;


class ServiceArgument
{
    protected $arguments = [];
    protected $expectedHttpCode = 200;

    public function __construct(array $arguments = [], int $expectedHttpCode = 200)
    {
        $this->arguments = $arguments;
        $this->expectedHttpCode = $expectedHttpCode;
    }

    /**
     * @return array
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    /**
     * @return int
     */
    public function getExpectedHttpCode(): int
    {
        return $this->expectedHttpCode;
    }
}

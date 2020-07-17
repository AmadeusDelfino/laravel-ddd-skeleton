<?php


namespace App\Infrastructure\Responses;


class HttpResponse
{
    protected $data;
    protected $httpCode;

    public function __construct($data, $httpCode = 200)
    {
        $this->data = $data;
        $this->httpCode = $httpCode;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getHttpCode(): int
    {
        return $this->httpCode;
    }

}

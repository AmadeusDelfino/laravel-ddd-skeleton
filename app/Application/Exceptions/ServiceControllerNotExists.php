<?php


namespace app\Application\Exceptions;

use Throwable;

class ServiceControllerNotExists extends \Exception
{
    protected $code = 500;
    protected $message = 'O service registrado no controller não existe';

    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        $this->message .= ': ' . $message;
    }
}

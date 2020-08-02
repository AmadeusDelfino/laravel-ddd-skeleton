<?php


namespace App\Domain\User\Exceptions;


class TokenExpiredException extends \Exception
{
    protected $message = 'O token está expirado';
    protected $code = 401;
}

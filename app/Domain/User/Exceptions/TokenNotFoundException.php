<?php


namespace App\Domain\User\Exceptions;


class TokenNotFoundException extends \Exception
{
    protected $message = 'O token não foi encontrado';
    protected $code = 401;
}

<?php


namespace App\Domain\User\Exceptions;


class UserLoginNotFoundException extends \Exception
{
    protected $message = 'Usuário ou senha não encontrados';
    protected $code = 404;
}

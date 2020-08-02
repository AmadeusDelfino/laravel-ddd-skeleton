<?php


namespace App\Domain\User\Services\Core;


use App\Domain\User\Services\Core\AuthServiceHandlers\LoginHandler;
use App\Infrastructure\Services\Service;

class AuthService extends Service
{
    protected $handlers = [
        'login' => LoginHandler::class,
    ];
}

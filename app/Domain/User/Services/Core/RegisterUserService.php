<?php


namespace App\Domain\User\Services\Core;


use App\Domain\User\Services\Core\RegisterUserServiceHandlers\RegisterUserHandler;
use App\Infrastructure\Services\Service;

/**
 * Class RegisterUserService
 * @package App\Domain\User\Services
 * @method register(array $data) User
 */
class RegisterUserService extends Service
{
    protected $handlers = [
        'register' => RegisterUserHandler::class,
    ];
}

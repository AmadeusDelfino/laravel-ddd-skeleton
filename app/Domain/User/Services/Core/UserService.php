<?php


namespace App\Domain\User\Services\Core;


use App\Domain\User\Services\Core\UserServiceHandlers\ProfileHandler;
use App\Domain\User\Services\Core\UserServiceHandlers\RegisterUserHandler;
use App\Domain\User\Services\Core\UserServiceHandlers\UpdateHandler;
use App\Infrastructure\Services\Service;

/**
 * Class RegisterUserService
 * @package App\Domain\User\Services
 */
class UserService extends Service
{
    protected $handlers = [
        'register' => RegisterUserHandler::class,
        'profile' => ProfileHandler::class,
        'update' => UpdateHandler::class,
    ];
}

<?php


namespace App\Domain\Auth\Services;


use App\Domain\Auth\Services\AuthServiceHandlers\Acl;
use App\Infrastructure\Services\Service;

/**
 * Class AuthService
 * @package App\Domain\Auth\Services
 *
 * @method acl(string $userToken) array
 */
class AuthService extends Service
{
    protected $handlers = [
        'acl' => Acl::class,
    ];
}

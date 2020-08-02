<?php


namespace App\Domain\User\Services\Core;


use App\Domain\User\Services\Core\TokenServiceHandlers\GenerateTokenHandler;
use App\Domain\User\Services\Core\TokenServiceHandlers\GetByToken;
use App\Infrastructure\Services\Service;

/**
 * Class TokenService
 * @package App\Domain\User\Services\Core
 * @method getByToken(string $token)
 */
class TokenService extends Service
{
    protected $handlers = [
        'generate' => GenerateTokenHandler::class,
        'getByToken' => GetByToken::class,
    ];
}

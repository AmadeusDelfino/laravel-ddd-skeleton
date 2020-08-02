<?php


namespace App\Domain\User\Services\Core\TokenServiceHandlers;


use App\Domain\User\Exceptions\TokenExpiredException;
use App\Domain\User\Exceptions\TokenNotFoundException;
use App\Domain\User\Models\UserToken;
use App\Infrastructure\Services\Handlers\BaseHandler;
use Ramsey\Uuid\Uuid;

class GetByToken extends BaseHandler
{
    protected $rules = [
        'token' => 'required',
    ];

    public function __invoke(array $arguments)
    {
        $this->validate($arguments);

        $token = $this->getToken($arguments['token']);

        if (!$token) {
            throw new TokenNotFoundException();
        }

        if($token->invalided_at !== null) {
            throw new TokenExpiredException();
        }

        return $token;
    }

    protected function getToken($token)
    {
        return UserToken::whereToken($token)->with('user')->first();
    }
}

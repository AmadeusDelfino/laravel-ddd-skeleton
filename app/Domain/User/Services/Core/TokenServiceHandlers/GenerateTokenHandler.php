<?php


namespace App\Domain\User\Services\Core\TokenServiceHandlers;


use App\Domain\User\Models\UserToken;
use App\Infrastructure\Services\Handlers\BaseHandler;
use Ramsey\Uuid\Uuid;

class GenerateTokenHandler extends BaseHandler
{
    protected $rules = [
        'user_id' => 'required',
    ];

    public function __invoke(array $arguments)
    {
        $this->validate($arguments);

        $token = $this->getTokenIfValid($arguments['user_id']);

        if ($token) {
            return $token;
        }

        return UserToken::create([
            'user_id' => $arguments['user_id'],
            'token' => str_replace('-', '', Uuid::uuid4()),
        ]);

    }

    protected function getTokenIfValid($userId)
    {
        return UserToken::whereUserId($userId)->where('invalided_at', null)->first();
    }
}

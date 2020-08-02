<?php


namespace App\Domain\User\Services\Core\UserServiceHandlers;


use App\Domain\User\Models\User;
use App\Infrastructure\Services\Handlers\BaseHandler;
use App\Infrastructure\Services\Handlers\CreateHandler;

class ProfileHandler extends BaseHandler
{
    protected $rules = [
        'user_id' => 'required',
    ];

    public function __invoke(array $arguments)
    {
        $this->validate($arguments);

        $user = User::find($arguments['user_id']);

        if(!$user) {
            throw new \RuntimeException('O recurso usuário não foi encontrado');
        }

        return $user;
    }
}

<?php


namespace App\Domain\User\Services\Core\AuthServiceHandlers;


use App\Domain\User\Exceptions\UserLoginNotFoundException;
use App\Domain\User\Models\User;
use App\Domain\User\Services\Core\TokenService;
use App\Infrastructure\Services\Handlers\BaseHandler;
use Illuminate\Support\Facades\Hash;

class LoginHandler extends BaseHandler
{
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function __invoke(array $arguments)
    {
        $this->validate($arguments);

        $user = $this->getUserByEmail($arguments['email']);

        if (!Hash::check($arguments['password'], $user->password)) {
            throw new UserLoginNotFoundException();
        }

        $token = (new TokenService())->generate(['user_id' => $user->id]);

        return [
            'token' => $token->token,
        ];
    }

    /**
     * @param $email
     *
     * @return mixed
     * @throws UserLoginNotFoundException
     */
    protected function getUserByEmail($email)
    {
        try {
            return User::whereEmail($email)->firstOrFail();
        } catch (\Exception $e) {
            throw new UserLoginNotFoundException();
        }
    }
}

<?php


namespace App\Domain\User\Services\Core\UserServiceHandlers;


use App\Domain\User\Models\User;
use App\Infrastructure\Services\Handlers\CreateHandler;

class RegisterUserHandler extends CreateHandler
{
    protected $model = User::class;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'birth_date' => 'required|date'
    ];

    protected function preProcess(array $arguments): array
    {
        $arguments['password'] = bcrypt($arguments['password']);

        return $arguments;
    }

}

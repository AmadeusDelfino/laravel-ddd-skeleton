<?php


namespace App\Domain\User\Services\Core\UserServiceHandlers;


use App\Domain\User\Models\User;
use App\Infrastructure\Services\Handlers\BaseHandler;
use App\Infrastructure\Services\Handlers\CreateHandler;

class UpdateHandler extends \App\Infrastructure\Services\Handlers\UpdateHandler
{
    protected $rules = [
        'reference_id' => 'required',
        'birth_date' => 'date',
    ];

    protected $model = User::class;

    protected function preProcess(array $arguments): array
    {
        unset($arguments['email']);
        if(isset($arguments['password'])) {
            $arguments['password'] = bcrypt($arguments['password']);
        }

        return $arguments;
    }

}

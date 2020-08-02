<?php


namespace App\Domain\User\Http\Controllers;


use App\Domain\User\Services\Core\UserService;
use App\Infrastructure\Controllers\Controller;
use App\Infrastructure\Services\ServiceArgument;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    /**
     * @var UserService
     */
    protected $service = UserService::class;

    public function register(Request $request)
    {
        return $this
            ->response(
                $this
                    ->service
                    ->register(new ServiceArgument($request->all(), 201))
            );
    }
}

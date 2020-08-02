<?php


namespace App\Domain\User\Http\Controllers;


use App\Domain\User\Services\Core\AuthService;
use App\Infrastructure\Controllers\Controller;
use App\Infrastructure\Services\ServiceArgument;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $service = AuthService::class;

    public function login(Request $request)
    {
        return $this->response(
            $this
                ->service
                ->login(new ServiceArgument($request->all(), 200))
        );
    }
}

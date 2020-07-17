<?php


namespace App\Domain\User\Http\Controllers;


use App\Domain\User\Services\Core\RegisterUserService;
use App\Infrastructure\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    /**
     * @var RegisterUserService
     */
    protected $service = RegisterUserService::class;

    public function register(Request $request)
    {
        $this->response($this->service->register($request->all()));
    }
}

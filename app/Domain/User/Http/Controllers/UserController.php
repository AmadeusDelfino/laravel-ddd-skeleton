<?php


namespace App\Domain\User\Http\Controllers;


use App\Domain\User\Services\Core\UserService;
use App\Infrastructure\Controllers\Controller;
use App\Infrastructure\Services\ServiceArgument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $service = UserService::class;

    public function profile()
    {
        return $this
            ->response(
                $this->service->profile(new ServiceArgument(['user_id' => $this->getLoggedUserId()], 200))
            );
    }

    public function update(Request $request)
    {
        return $this
            ->response(
                $this->service->update(new ServiceArgument(array_merge($request->all(), ['reference_id' => $this->getLoggedUserId()])))
            );
    }
}

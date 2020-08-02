<?php

namespace App\Domain\User\Http\Middleware;

use App\Domain\User\Services\Core\TokenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedMiddleware
{
    public function handle(Request $request, \Closure $next)
    {
        $token = $request->header('token');
        try {
            $token = (new TokenService())->getByToken(['token' => $token]);
            Auth::loginUsingId($token->user->id);

            return $next($request);
        } catch (ValidationException $e) {
            return response()
                ->json(['errors' => [$e->errors()]], 404);
        } catch (\Exception $e) {
            return response()
                ->json(['errors' => [$e->getMessage()]], $e->getCode() !== 0 ? $e->getCode() : 401);
        }
    }
}

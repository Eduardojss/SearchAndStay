<?php

namespace App\Http\Middleware;

use App\Enums\Response\ResponseEnum;
use App\Models\Central\Session;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class VerifyApiToken
{
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            auth()->setUser($user);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Unauthorized'], 500);
        }

        $request->attributes->add(['user' => $user]);
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $bearerToken = $request->headers->get('Authorization', null);

            if (!$bearerToken) {
                return response()->json(['message' => 'user not logged in'], 401);
            }
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                return response()->json(['message' => 'user not found'], 500);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'token is invalid'], 500);
        }
        return $next($request);
    }
}

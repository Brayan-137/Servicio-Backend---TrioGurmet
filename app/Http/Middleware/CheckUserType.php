<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        $token = $request->user()->currentAccessToken();

        if (!$token || !$token->can($userType)) {
            return response()->json([
                'message' => 'Unauthorized. User does not have the required type.'
            ], 401);
        }

        return $next($request);
    }
}

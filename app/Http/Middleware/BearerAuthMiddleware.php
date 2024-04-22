<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BearerAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $validToken = env('API_TOKEN');

        $providedToken = $request->bearerToken();

        if( !$providedToken ) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        if( $providedToken != $validToken ) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}

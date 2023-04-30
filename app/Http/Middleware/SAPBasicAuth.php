<?php

namespace App\Http\Middleware;

use App\Events\BasicAuthFailure;
use App\Support\Facades\BasicAuth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SAPBasicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $username = $request->server('PHP_AUTH_USER');
        $password = $request->server('PHP_AUTH_PW');

        if ( !BasicAuth::attempt($username, $password) ) {
            BasicAuthFailure::dispatch();
            return response()->json([ 'error' => 'Unauthenticated'], 401);
        }

        return $next($request);
    }
}

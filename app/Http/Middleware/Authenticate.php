<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as AuthFactory;

class Authenticate extends Middleware
{
    protected $auth;

    public function __construct(AuthFactory $auth)
    {
        $this->auth = $auth; 
    }

    public function handle($request, Closure $next, ...$guards)
    {
        // Check if the user is authenticated
        if ($this->auth->guard($guards)->guest()) {
            throw new AuthenticationException();
        }

        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}

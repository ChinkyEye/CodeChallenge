<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Illuminate\Http\Request;

class ManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    
    public function handle(Request $request, Closure $next)
    {
        if (!$this->auth->check() || ($request->user()->user_type != '1' || $request->user()->is_active != '1')){
            $this->auth->logout();
            return redirect ('/');
        }
        return $next($request);
    }
}

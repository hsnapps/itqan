<?php

namespace App\Http\Middleware;

use Closure;

class OnlyAdmin
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        //
    ];
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $roles = $request->user()->roles;
        $admin = \App\Role::where('name', 'admin')->first();

        abort_if(!$roles->contains($admin), 403);
        return $next($request);
    }
}

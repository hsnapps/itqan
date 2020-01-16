<?php

namespace App\Http\Middleware;

use Closure;

class CheckRules
{
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
        $route = $request->route();
        $parts = explode('.', $route->getName());
        if (!isset($parts[1])) { return $next($request); }
        
        $role = \App\Role::where('name', $parts[1])->first();
        $admin = \App\Role::where('name', 'admin')->first();
        if (!isset($role)) { return $next($request); }
        if($roles->contains($admin)) { return $next($request); }
        
        abort_if(!$roles->contains($role), 403);
        return $next($request);
    }
}

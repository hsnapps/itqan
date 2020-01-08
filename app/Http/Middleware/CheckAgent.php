<?php

namespace App\Http\Middleware;

use Closure;

class CheckAgent
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
        $agent = $request->userAgent();
        $accepted = str_contains($agent, 'Chrome') || str_contains($agent, 'Firefox') || str_contains($agent, 'Edge');
        $route = $request->path();
        
        if ($route == 'ie-not-allowed') {
            return $next($request);
        }
        if (!$accepted) {
            return redirect('ie-not-allowed');
        }
        return $next($request);
    }
}

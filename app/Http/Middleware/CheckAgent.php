<?php

namespace App\Http\Middleware;

use Closure;

class CheckAgent
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
        $agent = $request->userAgent();

        // Check chrome version
        $chromePos = strpos($agent, 'Chrome');
        if ($chromePos) {
            $chromeVersion = (int)substr($agent, $chromePos + 7, 2);
            if ($chromeVersion < 60) {
                return redirect('old-version');
            }
        }

        // Check firefox version
        $firefoxPos = strpos($agent, 'Firefox');
        if ($firefoxPos) {
            $firefoVersion = (int)substr($agent, $firefoxPos + 8, 2);
            if ($firefoVersion < 60) {
                return redirect('old-version');
            }
        }
        
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

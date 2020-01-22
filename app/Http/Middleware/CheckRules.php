<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\View;
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
        $myLessons = \App\Role::find(7);
        $roles = $request->user()->roles;
        $route = $request->route();
        $parts = explode('.', $route->getName());

        View::share('selectInstructor', !$roles->contains($myLessons));
        
        // Check if the user has my-lessons role
        if($roles->contains($myLessons)) {
            return $this->checkMyLessons($request, $next);
        }

        if (!isset($parts[1])) { return $next($request); }
        $role = \App\Role::where('name', $parts[1])->first();
        $admin = \App\Role::where('name', 'admin')->first();
        if (!isset($role)) { return $next($request); }
        if($roles->contains($admin)) { return $next($request); }
        
        abort_if(!$roles->contains($role), 403);
        return $next($request);
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private function checkMyLessons($request, Closure $next)
    {
        $routes = [
            'dashboard',                        // GET
            'admin.courses',                    // GET
            'admin.courses.edit',               // GET
            'admin.courses.lessons',            // GET

            'admin.lessons.edit',               // GET
            'admin.lessons.new',                // GET

            'admin.lessons.add',                // POST
            'admin.lessons.update',             // POST
            'admin.lessons.delete',             // POST
            'admin.lessons.update.multimedia',  // POST
            'admin.lessons.remove-multimedia',  // POST

            'admin.lessons.add.question',       // POST
            'admin.lessons.update.question',    // POST
            'admin.lessons.delete.question',    // POST

            'admin.lessons.add.file',           // POST
            'admin.lessons.update.file',        // POST
            'admin.lessons.delete.file',        // POST
            'admin.lessons.download.file',      // POST
        ];
        
        $route = $request->route()->getName();
        if (in_array($route, $routes)) {
           $method = $request->method();

           if ($method == 'POST') {
               $id = $request->user()->id;

               // Check for new lessons
                if ($request->has('course_id')) {
                   $instructor = \App\Instructor::find($request->instructor);
                   abort_if($id != $instructor->user_id, 403);
                }

                // Check for exist lessons
                if ($request->has('id')) {
                    $lessonId = $request->get('id');
                    $lesson = \App\Lesson::find($lessonId);
                    abort_if($id != $lesson->instructor->user_id, 403);
                }
           }

           return $next($request);
        }

        abort(403);
    }
}

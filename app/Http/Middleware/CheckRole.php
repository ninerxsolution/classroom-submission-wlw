<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('route-welcome');
        }

        // if (Auth::check()) {
        //     $user = Auth::user();
        //     if ($user->role == 'TEACHER') {
        //         return redirect()->route('route-teacher-dashboard');
        //     } elseif (in_array($user->role, ['ADMIN', 'SUPER_ADMIN'])) {
        //         return redirect()->route('route-welcome');
        //     }
        // }

        $user = Auth::user();

        $adminRoles = ['SUPER_ADMIN', 'ADMIN'];
        $teacherRoles = ['TEACHER'];

        if (in_array($role, $adminRoles) && in_array($user->role, $adminRoles)) {
            return $next($request);
        } elseif (in_array($role, $teacherRoles) && in_array($user->role, $teacherRoles)) {
            return $next($request);
            // return redirect()->route('route-teacher-dashboard');
        }

        return redirect()->route('route-welcome');
    }
}

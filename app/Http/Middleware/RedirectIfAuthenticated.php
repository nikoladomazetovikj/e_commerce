<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                $role = Auth::user()->role_id;

                switch ($role) {
                    case Role::MANAGER->value:
                    case Role::ADMIN->value :
                        return redirect(route('dashboard'));
                        break;
                    case Role::CONTENT_WRITER->value:
                        return redirect(route('site.content'));
                        break;
                    default:
                        return redirect(RouteServiceProvider::HOME);
                        break;
                }
               // return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}

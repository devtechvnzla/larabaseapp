<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserActivedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
      $user = \Auth::user();
      if($user->status != 1)
      {
        \Auth::logout();
        \Alert::warning('¡Lo siento!','Tu cuenta se encuentra inactiva, contacta a tu proveedor');
        return \Redirect::to('login');
      }
      else

      {
        return $next($request);
      }

    }
}

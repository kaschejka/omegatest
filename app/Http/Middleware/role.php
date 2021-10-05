<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\User;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


public function handle($request, Closure $next,...$roles)
{

        $userRole = $request->user();

        if($userRole && $userRole->count() > 0)
        {
            $userRole = $userRole->role;

            foreach($roles as $role){
        if ($userRole == $role){
            return $next($request);
        }
    }
               return redirect('home');
        }
        else
        {
            return redirect('login');
        }


    }
}

<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin 
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
        if(Auth::check()){
            $id=auth()->id();
            $user=User::find($id);
            $ad_id=$user->admin;
            if($ad_id==1){
            return $next($request);
            }
            return redirect('home');
        }
        return redirect('home');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
<<<<<<< HEAD

=======
use Illuminate\Support\Facades\Auth;
>>>>>>> caf6852 (crud)
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
<<<<<<< HEAD
        if(auth()->user()->is_admin==1){
            return $next($request);
        }
        return redirect('home')->with('error',"you dont have access to admin");
=======
        if(Auth::check() && Auth()->user()->role=='Admin'){
            return $next($request);
        }
        return redirect()->route('login');
>>>>>>> caf6852 (crud)
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class is_payed
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
        $j =DB::table('payment_job')->select('payment_status')->where('user_id', request()->user()->id)->where('approved', 'yes')->get();
        $p = User::find(1)->profile;

        if(Auth::check() && Auth()->user()->role=='Prent' && $j->paymet_status=='paid'){
            return $next($request);
        }
        elseif(Auth::check() && Auth()->user()->role=='Babysitter' && $p->paymet_status=='paid'){
            return $next($request);
        }
        return redirect()->route('stripe');
    }
}


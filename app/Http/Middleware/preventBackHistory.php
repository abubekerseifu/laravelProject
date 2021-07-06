<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class preventBackHistory
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
        $response=$next($request);
        return $response->header('Cache-control','no-cache,no-store,max-age=0,must-revalidate')
                        ->header('pragma','no-cache')
                        ->header('Expires','Sun,02 Jun 1990 00:00:00 GMT');
    }
}

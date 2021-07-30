<?php

namespace App\Providers;
use DB;
use View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    
    $user_num = DB::table('users')->select('*')->count();
    View::share ( 'user_num', $user_num);
    $b_num = DB::table('users')->select('*')->where('role','Babysitter')->count();
    View::share ( 'b_num', $b_num);
    $p_num = DB::table('users')->select('*')->where('role','Parent')->count();
    View::share ( 'p_num', $p_num);
    $a_num = DB::table('users')->select('*')->where('role','Admin')->count();
    View::share ( 'a_num', $a_num);
    }
}

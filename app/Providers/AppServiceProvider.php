<?php

namespace App\Providers;
use DB;
use View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Validator;

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

    Validator::extend('valid_birth_date', function ($attribute, $value, $parameters, $validator){

        $date_different = date_diff(new \DateTime($value), new \DateTime())->y;

        return $date_different >= 18;
    });
    Validator::extend('valid_start_year', function ($attribute, $value, $parameters, $validator){

        $date_different = date_diff(new \DateTime($value), new \DateTime())->y;

        return $date_different <= 0;
    });
    Validator::extend('valid_start_month', function ($attribute, $value, $parameters, $validator){

        $date_different = date_diff(new \DateTime($value), new \DateTime())->m;

        return $date_different <= 0;
    });
     Validator::extend('valid_start_day', function ($attribute, $value, $parameters, $validator){

        $date_different = date_diff(new \DateTime($value), new \DateTime())->d;

        return $date_different <= 0;
    });
}
}

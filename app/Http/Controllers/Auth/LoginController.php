<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    protected function redirectTo(){
        if(Auth()->user()->role=='Admin'){
            return route('admin.homedashboard');
        }
        elseif(Auth()->user()->role=='Babysitter'){
            return route('home');
        }
        elseif(Auth()->user()->role=='Parent'){
            return route('home');
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){
        $input =$request->all();
        $this->validate($request,['email'=>'required|email',
        'password'=>'required']);
        if(auth()->attempt(array('email'=>$input['email'],'password'=>$input['password']))){
            if(auth()->user()->role=='Admin'){
                return redirect()->route('admin.homedashboard');
            }
            elseif(auth()->user()->role=='Parent'){
                    return redirect()->route('home');
                }
                elseif(auth()->user()->role=='Babysitter'){
                    return redirect()->route('home');
                }

        }
            else{
                return redirect()->route('login')->with('error',"Email or password is invalid");
            }
        }
    }


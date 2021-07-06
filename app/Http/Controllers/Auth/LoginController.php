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
            return route('admin.dashboard');
        }
        elseif(Auth()->user()->role=='Babysitter'){
            return route('babysitter.home');
        }
        elseif(Auth()->user()->role=='Parent'){
            return route('parent.home');
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

            if(auth()->user()->is_admin==1){
                return redirect()->route('admin.home');
            }
            if(auth()->user()->role=='Admin'){
                return redirect()->route('admin.dashboard');
            }
            elseif(auth()->user()->role=='Parent'){
                    return redirect()->route('parent.home');
                }
                elseif(auth()->user()->role=='Babysitter'){
                    return redirect()->route('babysitter.home');
                }

        }
            else{
                return redirect()->route('login')->with('error',"Email or password is invalid");
            }
        }
    }


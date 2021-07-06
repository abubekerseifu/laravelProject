<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
// use App\Http\Controllers\Log;
class ProfileController extends Controller
{
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct() { $this->middleware('auth'); }
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'numbers' => ['required', 'integer','unique:profile'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'gender' => ['required'],
            'birth_date'=>['required'],
            'experience' => ['required', 'integer'],
            'price' => ['required'],
            'living_condition' => ['required'],
        ]);
    }

    
    protected function store(Request $request)
    {
        // Log::info('Before inserting'); 
         $profile=new Profile();
        //   Log::info('Before inserting'); 
         $profile->user_id=request()->user()->id;
         $profile->fname= $request->fname;
         $profile->lname= $request->lname;
         $profile->numbers= $request->numbers;
         $profile->address= $request->address;
         $profile->city= $request->city;
         $profile->country= $request->country;
         $profile->gender= $request->gender;
         $profile->birth_date = $request->birth_date;
         $profile->experience = $request->experience;
         $profile->price = $request->price;
         $profile->living_condition = $request->living_condition;
         $profile->weekend_break = $request->weekend_break;
        //  if ([$request->chores])) {
        //  $profile->chores = $request->chores;
         $profile->facebook = $request->facebook;
         $profile->whatsup = $request->whatsup;
         $profile->viber = $request->viber;
         $profile->telegram = $request->telegram;
         $profile->save();
        // Log::info('after inserting'); 
        return view('welcome');
     
    }
    protected function allprofile(){
        return Profile::select('fname','lname','address','gender','price')->orderBy('created_at')->get();
    
}
}
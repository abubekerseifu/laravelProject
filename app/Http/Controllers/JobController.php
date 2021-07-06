<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
// use App\Http\Controllers\Log;
class JobController extends Controller
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
            'start_date'=>['required'],
            'num_children' => ['required', 'integer'],
            'price' => ['required'],
             'upper_age'=>['required','integer'],
             'lower_age'=>['required','integer'],
            'living_condition' => ['required'],
            'chores'=>['required'],
            'weekend_break'=>['required'],
        ]);
    }
    protected function store(Request $request)
    {
         $job=new Job();
         $job->user_id=request()->user()->id;
         $job->fname= $request->fname;
         $job->lname= $request->lname;
         $job->phnumber= $request->phnumber;
         $job->address= $request->address;
         $job->city= $request->city;
         $job->country= $request->country;
         $job->gender= $request->gender;
         $job->num_children= $request->num_children;
         $job->upper_age = $request->upper_age;
         $job->lower_age = $request->lower_age;
         $job->price = $request->price;
         $job->living_condition = $request->living_condition;
         $job->weekend_break = $request->weekend_break;
         $job->chores = $request->chores;
         $job->start_date = $request->start_date;
         $job->facebook = $request->facebook;
         $job->whatsup = $request->whatsup;
         $job->viber = $request->viber;
         $job->telegram = $request->telegram;
         $job->save();
         return view('welcome');
     
    }
    protected function alljob(){
        return Job::select('fname','lname','address','gender','num_children')->orderBy('created_at')->get(); 
//         as $profile) {
//                 echo $profile->fname;
// }
// return Destination::orderByDesc(
//     Flight::select('arrived_at')
//         ->whereColumn('destination_id', 'destinations.id')
//         ->orderBy('arrived_at', 'desc')
//         ->limit(1)
// )->get();
        // $profile = Profile::where('status', 'active')
        //        ->orderBy('created_at')
        //        ->take(10)
        //        ->get();
    }
    
}

           
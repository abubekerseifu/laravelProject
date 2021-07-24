<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use DB;
// use App\Http\Controllers\Log;
class JobController extends Controller
{
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct() { }
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
        DB::transaction(function () use ($request){
        DB::table('users')
        ->where('id', request()->user()->id)
        ->update(array('has_job'=>"yes"));
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
         $job->description=$request->description;
         if($request->file('image')){
             $file=$request->file('image');
             $extension=$file->getClientOriginalExtension();
             $filename=time().'.'.$extension;
             $file->move("uploads/ParentImage/",$filename);
             $job->image=$filename;
         }
         else{
            $job->image='/av.png';
         }
         $job->save();
         });
         return view('welcome');
     
    }
    protected function alljob(){
        $jobs=DB::table('job')->select('*')->where('job_status', 'public')->where('approved', 'yes')->get();
        return view('joblist')->with('jobs',$jobs);
        //orderBy('created_at')->get();
    }
     protected function alljobAdmin(){
        $jobs=Job::all();
        return view('admin.parents')->with('jobs',$jobs);
        //orderBy('created_at')->get();
    }
    protected function ShowSingleJob($id){
    $job = DB::table('job')->select('*')->where('user_id', $id)->first();
    return view('parent.jobdetail')->with('job',$job);
}
protected function ShowSingleJobByBabysitter($id){
    $job = DB::table('job')->select('*')->where('job_id', $id)->first();
    return view('babysitter.viewjobdetailbybabysitter')->with('job',$job);
}
protected function makeJobPublic($jid){
    Job::where('job_id', $jid)->update(['job_status' => 'public']);
    $job = DB::table('job')->select('*')->where('job_id', $jid)->first();
    return view('parent.jobdetail')->with('job',$job);
}
protected function makeJobPrivate($jid){
    Job::where('Job_id', $jid)->update(['job_status' => 'private']);
    $job = DB::table('job')->select('*')->where('job_id', $jid)->first();
    return view('parent.jobdetail')->with('job',$job);
}
protected function deleteJob(Request $request,$id){
    DB::transaction(function () use ($request,$id){
        DB::table('users')
        ->where('id', request()->user()->id)
        ->update(array('has_job'=>"no"));
    DB::table('job')->where('job_id',$id)->delete();
    });
    return view('welcome');
}
protected function updateJob(Request $request,$job_id){
        $job = Job::find($job_id);
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
         $job->description=$request->description;
         if($request->file('image')){
             $file=$request->file('image');
             $extension=$file->getClientOriginalExtension();
             $filename=time().'.'.$extension;
             $file->move("uploads/ParentImage/",$filename);
             $job->image=$filename;
         }
         else{
            $job->image='/av.png';
         }
         $job->save();
    $job = DB::table('job')->select('*')->where('job_id', $job_id)->first();
    return view('parent.jobdetail')->with('job',$job);
}
}

           
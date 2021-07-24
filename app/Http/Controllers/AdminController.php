<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Profile;
use App\Models\Job;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function adminHome()
    {
        $users=User::all();
        //View::share ( 'users', $users);
        return view('admin.dashboard')->with('users',$users);
        //orderBy('created_at')->get();
    
    }
    protected function createUser(Request $request)
    {
       DB::transaction(function () use ($request){
       $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->role=$request->role;
        $user->save();
        
    });
    
        $users=User::all();
        return view('admin.dashboard')->with('users',$users);
    }
    protected function deleteUser(Request $request,$id){
   
        DB::table('users')->where('id',$id)->delete();
        $users=User::all();
        return view('admin.dashboard')->with('users',$users);
    }
    protected function makeAdmin($id){
    User::where('id', $id)->update(['role' => 'Admin']);
    $users=User::all();
    return view('admin.dashboard')->with('users',$users);
    
}
 protected function approveProfile($id){
    Profile::where('profile_id', $id)->update(['approved' => 'yes']);
    $profiles=Profile::all();
    return  view('admin.babysitters')->with( 'profiles', $profiles);
    
}protected function disApproveProfile($id){
    Profile::where('profile_id', $id)->update(['approved' => 'no']);
    $profiles=Profile::all();
    return  view('admin.babysitters')->with( 'profiles', $profiles);
    
}
protected function approveJob($id){
    Job::where('job_id', $id)->update(['approved' => 'yes']);
    $jobs=Job::all();
    return  view('admin.parents')->with( 'jobs', $jobs);
    
}protected function disApproveJob($id){
    Job::where('job_id', $id)->update(['approved' => 'no']);
    $jobs=Profile::all();
    return  view('admin.parents')->with( 'jobs', $jobs);
    
}
}

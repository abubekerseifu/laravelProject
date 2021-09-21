<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Profile;
use App\Models\Job;
use DB;
use View;
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
        $this->validate($request,['name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
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
    protected function postJob(Request $request)
    {
         $this->validate($request,[
             'user_id'=>['required'],
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'image'=>['image', 'mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'phnumber' => ['required', 'integer','unique:job'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'gender' => ['required'],
            'start_date'=>['required','date','after:today'],
            'num_children' => ['required', 'integer'],
            'price' => ['required','integer'],
             'upper_age'=>['required','integer','gte:lower_age'],
             'lower_age'=>['required','integer','gte:0'],
            'living_condition' => ['required'],
            'chores'=>['required'],
            'weekend_break'=>['required']
        ], ['start_date.after' => 'start date must be in the future',
        'fname.required' => 'first name is required','lname.required' => 'last name is required',
        'phnumber.required' => 'Phone number is required',
        'num_children.required' => 'number of children is required',
        'num_children.integer' => 'number of children must be a number',
        'price.integer' => 'price must be a number',
        'image.image' => 'selected file is not an image',
        ]);
         DB::transaction(function () use ($request){
         $job=new Job();
         $job->user_id=$request->user_id;
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
            $job->image="";
         }
         $job->save();
          DB::table('users')
        ->where('id', $request->user_id)
        ->update(array('has_job'=>"yes"));
         });
         $jobs=Job::all();
         $parents=DB::table('users')->select('*')->where('role', 'Parent')->where('has_job','no')->get();
        View::share('parents',$parents);
        return view('admin.parents')->with('jobs',$jobs);
    }
    protected function postProfile(Request $request)
    {
         $this->validate($request,[ 'fname' => ['required', 'string', 'max:255'],
         'user_id'=>['required'],
        'lname' => ['required', 'string', 'max:255'],
        'image'=>['image', 'mimes:jpeg,png,jpg,gif,svg|max:2048'],
        'numbers' => ['required', 'integer','unique:profile'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'gender' => ['required'],
            'birth_date'=>['required','date','valid_birth_date'],
            'experience' => ['required', 'integer'],
            'price' => ['required'],
            'living_condition' => ['required'],
        ],
        ['birth_date.valid_birth_date' => 'You have to be older than 18',
        'image.image' => 'selected file is not an image',
        ]);
       DB::transaction(function () use ($request){
       
         $profile=new Profile();
         $profile->user_id=$request->user_id;
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
         $profile->chores=$request->chores;
         if($request->file('image')){
             $file=$request->file('image');
             $extension=$file->getClientOriginalExtension();
             $filename=time().'.'.$extension;
             $file->move("uploads/Profile/",$filename);
             $profile->image=$filename;
         }
         else{
            $profile->image="";
         }
         $profile->facebook = $request->facebook;
         $profile->whatsup = $request->whatsup;
         $profile->viber = $request->viber;
         $profile->telegram = $request->telegram;
         $profile->moc = $request->moc;
         $profile->description = $request->description;
         $profile->save();
          DB::table('users')
        ->where('id', $request->user_id)
        ->update(array('has_profile'=>"yes"));
         });
        $babysitters=DB::table('users')->select('*')->where('role', 'Babysitter')->where('has_profile','no')->get();
        View::share('babysitters',$babysitters);
        $profiles=Profile::all();
        return view('admin.babysitters')->with('profiles',$profiles);
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
    $babysitters=DB::table('users')->select('*')->where('role', 'Babysitter')->where('has_profile','no')->get();
    View::share('babysitters',$babysitters);
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

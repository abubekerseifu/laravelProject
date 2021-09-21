<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use DB;
use View;
use Stripe;
use Session;
// use App\Http\Controllers\Log;
class JobController extends Controller
{
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct() { 
         
     }
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
    protected function store(Request $request)
    {
        $this->validate($request,[
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
             'upper_age'=>['required','integer','gt:lower_age'],
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
        ]);
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
            $job->image="";
         }
         $job->save();
         });
         return view('welcome');
     
    }
    protected function contacted($job_id){
        $job = DB::table('job')->select('*')->where('job_id', $job_id)->first();
        $babysitter_payments = DB::table('settings')->pluck('babysitter_make_p');
        foreach ($babysitter_payments as $babysitter_payment) {
       
        if($babysitter_payment=='yes'){
            $n_payment='yes'; 
        }
        else{
             $n_payment='no';
              DB::table('payment_job')->insert([
                'user_id' => request()->user()->id,
                'job_id' => $job_id,
                'contacted' => 'yes'
                ]);
        }

    }
     $contacted=DB::table('payment_job')->select('contacted')->where('job_id', $job_id)->first();
                View::share('contacted',$contacted);
                View::share('n_payment',$n_payment);
    return view('babysitter.viewjobdetailbybabysitter')->with('job',$job);
}
    protected function alljob(){
        $alwayss = DB::table('settings')->pluck('always_approve');
        foreach ($alwayss as $always) {
       
        if($always=='yes'){
        $jobs=DB::table('job')->select('*')->where('job_status', 'public')->where('approved', 'yes')->get();
        }
        else{
             $jobs=Job::all();
           
        }
        }
        return view('joblist')->with('jobs',$jobs);
        //orderBy('created_at')->get();
    }
     protected function alljobAdmin(){
        $parents=DB::table('users')->select('*')->where('role', 'Parent')->where('has_job','no')->get();
        View::share('parents',$parents);
        $jobs=Job::all();
        return view('admin.parents')->with('jobs',$jobs);
        //orderBy('created_at')->get();
    }
    protected function ShowSingleJob($id){
    $job_id = DB::table('job')->select('job_id')->where('user_id', $id)->first();
    $job = DB::table('job')->select('*')->where('user_id', $id)->first();
    $jobs=Job::all();
    foreach($jobs as $j){
            $contacted =DB::table('payment_job')->select('contacted')->where('job_id', $j->job_id)->first();
            $u_id =DB::table('payment_job')->select('user_id')->where('job_id', $j->job_id)->first();

    }
            View::share('contacted',$contacted);
            if($contacted){
            foreach($u_id as $uid){
                $name=DB::table('profile')->select('*')->where('user_id',$uid)->first();
                View::share('name',$name);
    }}
    return view('parent.jobdetail')->with('job',$job);
}
protected function ShowSingleJobByBabysitter($job_id,Request $request){
    $job = DB::table('job')->select('*')->where('job_id', $job_id)->first();
    $babysitter_payments = DB::table('settings')->pluck('babysitter_make_p');
    $n_payment='';
    foreach ($babysitter_payments as $babysitter_payment) {
       
        if($babysitter_payment=='yes'){
            $n_payment='yes';
           
           
        }
        else{
             $n_payment='no';
             $contacted=DB::table('payment_job')->select('contacted')->where('job_id', $job_id)->first();
             View::share('contacted',$contacted);
        }
                View::share('n_payment',$n_payment);
            
    }
            if($n_payment=='yes'){
            $out = new \Symfony\Component\Console\Output\ConsoleOutput();
            $count=DB::table('users')->select('count')->where('id', request()->user()->id)->first();
            if($count->count >= 1 and $count->count!=4){
            $paid='paid';
            }
            else{
                $paid='';
            }
            View::share('paid',$paid);
            //$count=DB::table('users')->select('count')->where('id', request()->user()->id)->first();
                
    }
    
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
    $this->validate($request,[
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'image'=>['image', 'mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'phnumber' => ['required', 'integer',\Illuminate\Validation\Rule::unique('job','phnumber')->ignore($job_id, 'job_id')],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'gender' => ['required'],
            'start_date'=>['required','date','after:today'],
            'num_children' => ['required', 'integer'],
            'price' => ['required','integer'],
             'upper_age'=>['required','integer','gt:lower_age'],
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
         
    $job->save();
    $job = DB::table('job')->select('*')->where('job_id', $job_id)->first();
    return redirect()->back();
}
 public function viewPaymenttForm($job_id)
    {
        $job = DB::table('job')->select('*')->where('job_id', $job_id)->first();
        View::share('job',$job);
        return view('parent.payforparent');
    }
    public function viewParentContact(Request $request,$job_id)
    {
            $count=DB::table('users')->select('count')->where('id', request()->user()->id)->first();
            if($count->count >= 1){
                DB::table('payment_job')->insert([
                'user_id' => request()->user()->id,
                'job_id' => $job_id,
                'paymet_status' => 'paid'
                ]);
                $query=DB::table('users')->where('id', request()->user()->id);
                $query->decrement('count');
            }
         $pay=DB::table('payment_job')->select('job_id')->where('user_id', request()->user()->id)->first();
         foreach ($pay as $p) {
             $query=DB::table('users')->where('id', request()->user()->id);
             $query->increment('count');
            }
        //  }
        //  $j_id=DB::table('payment_job')->select('job_id')->where('user_id', request()->user()->id)->first();
        //  $count=DB::table('users')->select('count')->where('id', request()->user()->id)->first();
        //  if($j_id->job_id==$job_id and $count->count!=3){
        //  $query=DB::table('users')->where('id', request()->user()->id);
        //  $query->increment('count');
        //  }
        //  if($j_id->job_id==$job_id and $count->count==4){
        //      $query=DB::table('users')->where('id', request()->user()->id);
        //      $query->decrement('count');
        //  }
         $c=DB::table('users')->select('count')->where('id', request()->user()->id)->first();
          if($c->count < 1){
               $user = User::find(request()->user()->id);
               $user->count = 4;
               $user->save();
          }
        
        $job = DB::table('job')->select('*')->where('job_id', $job_id)->first();
        View::share('job',$job);
        return view('parent.pcontactinfo');
    }
    
    public function makePay(Request $request,$job_id)
    {
       $out = new \Symfony\Component\Console\Output\ConsoleOutput();
       $out->writeln("before stripe");
       Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       Stripe\Charge::create ([
                "amount" => 100 * 250,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "This payment is for testing purpose from habeshababysitters.com"
        ]);
        Session::flash('success', 'Payment successful!');
        return redirect()->route('v.parent.contactinfo',['job_id'=>$job_id]);
    }
}

           
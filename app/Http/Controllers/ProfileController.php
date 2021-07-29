<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Setting;
use DB;
use View;
use Stripe;
use Session;
// use App\Http\Controllers\Log;
class ProfileController extends Controller
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
            'birth_date'=>['required'],
            'experience' => ['required', 'integer'],
            'price' => ['required'],
            'living_condition' => ['required'],
        ]);
    }

    
    protected function store(Request $request)
    {
        DB::transaction(function () use ($request){
       
         $profile=new Profile();
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
         $profile->chores=$request->chores;
        //  $profile->description=$request->description;
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
        ->where('id', request()->user()->id)
        ->update(array('has_profile'=>"yes"));
        
         });
        // Log::info('after inserting'); 
        return redirect()->route('home');
        
     
    }
    protected function allprofile(){
    $alwayss = DB::table('settings')->pluck('always_approve');
    foreach ($alwayss as $always) {
       
        if($always=='yes'){
            $profiles=DB::table('profile')->select('*')->where('profile_status', 'public')->where('approved', 'yes')->get();
           
        }
        else{
             $profiles=Profile::all();
           
        }
        
    }
        
        return view('babysitterlist')->with('profiles',$profiles);
        //orderBy('created_at')->get();
}
 protected function allprofileAdmin(){
        
        $profiles=Profile::all();
        $babysitters=DB::table('users')->select('*')->where('role', 'Babysitter')->where('has_profile','no')->get();
        View::share('babysitters',$babysitters);
        return  view('admin.babysitters')->with( 'profiles', $profiles);
        //orderBy('created_at')->get();
    
}
 
protected function ShowSingleProfile($id){
    $profile = DB::table('profile')->select('*')->where('user_id', $id)->first();
    return view('babysitter.profiledetail')->with('profile',$profile);
}
protected function ShowSingleProfileByParent($profile_id){
    $profile = DB::table('profile')->select('*')->where('profile_id', $profile_id)->first();
    return view('parent.viewbabysitterdetailbyparent')->with('profile',$profile);
}
protected function updateProfile(Request $request,$profile_id){
         $profile = Profile::find($profile_id);
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
        //  $profile->description=$request->description;
         if($request->file('image')){
             $file=$request->file('image');
             $extension=$file->getClientOriginalExtension();
             $filename=time().'.'.$extension;
             $file->move("uploads/Profile/",$filename);
             $profile->image=$filename;
         }
         
         $profile->facebook = $request->facebook;
         $profile->whatsup = $request->whatsup;
         $profile->viber = $request->viber;
         $profile->telegram = $request->telegram;
         $profile->moc = $request->moc;
         $profile->description = $request->description;
         $profile->save();
         $profile = DB::table('profile')->select('*')->where('profile_id', $profile_id)->first();
    return redirect()->back();
}
protected function makeProfilePublic($pid){
    Profile::where('profile_id', $pid)->update(['profile_status' => 'public']);
    $profile = DB::table('profile')->select('*')->where('profile_id', $pid)->first();
    return view('babysitter.profiledetail')->with('profile',$profile);
}
protected function makeProfilePrivate($pid){
    Profile::where('profile_id', $pid)->update(['profile_status' => 'private']);
    $profile = DB::table('profile')->select('*')->where('profile_id', $pid)->first();
    return view('babysitter.profiledetail')->with('profile',$profile);
}
protected function deleteProfile(Request $request,$id){
    DB::transaction(function () use ($request,$id){
        DB::table('users')
        ->where('id', request()->user()->id)
        ->update(array('has_profile'=>"no"));
    DB::table('profile')->where('profile_id',$id)->delete();
    });
    return view('welcome');
}
    public function viewPaymenttForm($profile_id)
    {
        $profile = DB::table('profile')->select('*')->where('profile_id', $profile_id)->first();
        View::share('profile',$profile);
        return view('babysitter.payforbabysitter');
    }
    public function viewBabysitterContact(Request $request,$profile_id)
    {
        $profile = DB::table('profile')->select('*')->where('profile_id', $profile_id)->first();
        View::share('profile',$profile);
        return view('babysitter.bcontactinfo');
    }
    
    public function makePay(Request $request,$profile_id)
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
            DB::table('payment_profile')->insert([
                'user_id' => request()->user()->id,
                'profile_id' => $profile_id,
                'paymet_status' => 'paid'
                ]);
        Session::flash('success', 'Payment successful!');
        return redirect()->route('v.babysitter.contactinfo',['profile_id'=>$profile_id]);
    }
}
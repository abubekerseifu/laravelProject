<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Models\Setting;
class SettingController extends Controller
{
   protected function ShowSetting($id){
    $setting = DB::table('settings')->select('*')->where('user_id', $id)->first();
    return view('admin.settings')->with('setting',$setting);
}

   protected function UpdateSetting(Request $request){
        $setting=DB::table('settings')->update(array('babysitter_make_p'=> $request->babysitter_make_p,
        'always_approve'=>$request->always_approve));
        // $setting->babysitter_make_p=$request->babysitter_make_p;
        // $setting->always_approve=$request->always_approve;
       return redirect()->route('admin.homedashboard');
}
}

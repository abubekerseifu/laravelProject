<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
class SettingController extends Controller
{
   
   protected function UpdateBpaySetting(Request $request){
       if($request->has('b_pay') && $request->has('approve')){
       Setting::where('babysitter_make_pay', 'no')
      ->update(['babysitter_make_pay' => 'yes']);
       Setting::where('alway_approve', 'no')
      ->update(['always_approve' => 'yes']);
       }
       elseif($request->has('b_pay')){
        Setting::where('babysitter_make_pay', 'no')
      ->update(['babysitter_make_pay' => 'yes']);
       }
       else{
            Setting::where('alway_approve', 'no')
      ->update(['always_approve' => 'yes']);
       }
       return view('admin.setting');
}
}

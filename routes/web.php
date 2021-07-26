<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Auth\RegisterController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    
});

Route::get('/home', function () {
    return view('welcome');
    
})->name('front');
Route::get('/parent/{id}/job/detail','App\Http\Controllers\JobController@ShowSingleJob')->name('job.detail');
Route::get('/welcome', function () {
    return view('first');
});


// Route::any('{stng}',function(){
//     return view('first');
// });


Route::get('/about', function () {
    return view('about');
});
// Route::get('/babysitters', function () {
//     return view('babysitterlist');
// });
Route::get('/howitworks', function () {
    return view('howitworks');
});
Route::get('/contactus', function () {
    return view('contactus');
});
Route::get('/babysitters','App\Http\Controllers\ProfileController@allprofile')->name('babysitters.list');
Route::get('/joblist', 'App\Http\Controllers\JobController@alljob');
Route::get('/babysitterdetail/{profile_id}','App\Http\Controllers\ProfileController@ShowSingleProfileByParent')->name('viewbabysitter.detail');
Route::get('/jobdetail/{id}','App\Http\Controllers\JobController@ShowSingleJobByBabysitter')->name('viewjob.detail');

// Route::get('/babysitter/profile', function () {
//     return view('babysitter.profile');
// });
//Auth::routes(['verify' => true]);
Route::middleware(['middleware'=>'preventBackHistory'])->group(function(){
        Auth::routes();
});
// Route::get('/email/verify', function () {
//     return view('auth.verify');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();

//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware'=>['auth','is_admin','preventBackHistory']], function () {
    Route::get('/home/dashboard',[App\Http\Controllers\AdminController::class,'adminHome'])->name('admin.homedashboard');
    Route::get('/babysitters','App\Http\Controllers\ProfileController@allprofileAdmin');
    Route::get('/parents', 'App\Http\Controllers\JobController@alljobAdmin');
    Route::get('/settings/{id}', 'App\Http\Controllers\SettingController@ShowSetting')->name('v.setting');
    Route::put('/settings/update', 'App\Http\Controllers\SettingController@UpdateSetting')->name('s.update');
    Route::get('/makeAdmin/{id}','App\Http\Controllers\AdminController@makeAdmin')->name('make.admin');
    Route::get('/approve/profile/{profile_id}','App\Http\Controllers\AdminController@approveProfile')->name('approve.profile');
    Route::get('/disapprove/profile/{profile_id}','App\Http\Controllers\AdminController@disApproveProfile')->name('disapprove.profile');
    Route::get('/approve/job/{job_id}','App\Http\Controllers\AdminController@approveJob')->name('approve.job');
    Route::get('/disapprove/job/{job_id}','App\Http\Controllers\AdminController@disApproveJob')->name('disapprove.job');
    Route::post('/register/user','App\Http\Controllers\AdminController@createUser')->name('r.user');
    Route::get('/delete/user/{user_id}','App\Http\Controllers\AdminController@deleteUser')->name('delete.user');

});

Route::group(['prefix' => 'babysitter', 'middleware'=>['auth','is_babysitter','preventBackHistory']], function () {
    Route::get('home',[App\Http\Controllers\BabysitterController::class,'index'])->name('babysitter.home');
    Route::get('profile', function () {
    return view('babysitter.profile');});
    Route::post('profile',  [App\Http\Controllers\ProfileController::class, 'store'])->name('p.post');
    Route::get('/makeprofile/public/{profile_id}','App\Http\Controllers\ProfileController@makeProfilePublic')->name('makepublic.profile');
    Route::get('/makeprofile/private/{profile_id}','App\Http\Controllers\ProfileController@makeProfilePrivate')->name('makeprivate.profile');
    Route::get('/delete/profile/{profile_id}','App\Http\Controllers\ProfileController@deleteProfile')->name('delete.profile');
    Route::put('/update/profile/{profile_id}','App\Http\Controllers\ProfileController@updateProfile')->name('p.update');
    Route::get('/{id}/profile/detail','App\Http\Controllers\ProfileController@ShowSingleProfile')->name('babysitter.detail');
});

Route::group(['prefix' => 'parent', 'middleware'=>['auth','is_parent','preventBackHistory']], function () {
    Route::get('home',[App\Http\Controllers\ParentController::class,'parent'])->name('parent.home');
    Route::get('job', function () {
    return view('parent.job');
});
    Route::post('job',  [App\Http\Controllers\JobController::class, 'store'])->name('j.post');
    Route::get('/makejob/public/{job_id}','App\Http\Controllers\JobController@makeJobPublic')->name('makepublic.job');
    Route::get('/makejob/private/{job_id}','App\Http\Controllers\JobController@makeJobPrivate')->name('makeprivate.job');
    Route::get('/delete/job/{job_id}','App\Http\Controllers\JobController@deleteJob')->name('delete.job');
    Route::put('/update/job/{job_id}','App\Http\Controllers\JobController@updateJob')->name('j.update');
});


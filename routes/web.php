<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;


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
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/Habeshababysitters','App\Http\Controllers\frontController@frontMethod');
Auth::routes();
// Route::any('{stng}',function(){
//     return view('first');
// });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/parent', [App\Http\Controllers\HomeController::class, 'parent'])->name('parent');
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/about', function () {
    return view('about');
});
Route::get('/howitworks', function () {
    return view('howitworks');
});
Route::get('/contactus', function () {
    return view('contactus');
});
Route::get('/babysitterlist','App\Http\Controllers\ProfileController@allprofile');
Route::get('/joblist', 'App\Http\Controllers\JobController@alljob');

// Route::get('/babysitter/profile', function () {
//     return view('babysitter.profile');
// });
Route::get('/Habeshababysitters','App\Http\Controllers\frontController@frontMethod');
Route::middleware(['middleware'=>'preventBackHistory'])->group(function(){
        Auth::routes(['verify' => true]);
});
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware'=>['auth','is_admin','preventBackHistory','verified']], function () {
    Route::get('dashboard',[App\Http\Controllers\AdminController::class,'adminHome'])->name('admin.dashboard');
});
Route::group(['prefix' => 'babysitter', 'middleware'=>['auth','is_babysitter','preventBackHistory']], function () {
    Route::get('home',[App\Http\Controllers\BabysitterController::class,'index'])->name('babysitter.home');
    Route::get('profile', function () {
    return view('babysitter.profile');});
    Route::post('profile',  [App\Http\Controllers\ProfileController::class, 'store'])->name('p.post');
});

Route::group(['prefix' => 'parent', 'middleware'=>['auth','is_parent','preventBackHistory']], function () {
    Route::get('home',[App\Http\Controllers\ParentController::class,'parent'])->name('parent.home');
    Route::get('job', function () {
    return view('parent.job');
});
    Route::post('job',  [App\Http\Controllers\JobController::class, 'store'])->name('j.post');
});


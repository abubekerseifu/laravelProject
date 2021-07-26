<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model; 


class User extends Authenticatable
// implements MustVerifyEmail


{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function hasRole($role)
    {
        return $this->role == $role;
    }
    public function hasProfile($has_profile)
    {
        return $this->has_profile == $has_profile;
    }
    public function hasJob($has_job)
    {
        return $this->has_job == $has_job;
    }
   public function profile(){
       return $this->hasOne(Profile::class);
   }
   public function setting(){
       return $this->hasOne(Setting::class);
   }
   public function job(){
       return $this->hasOne(Job::class);
   }
    // public function handle(Registered $event)
    // {
    //     if ($event->user instanceof MustVerifyEmail && ! $event->user->hasVerifiedEmail()) {
    //         $event->user->sendEmailVerificationNotification();
    //     }
    // }

}

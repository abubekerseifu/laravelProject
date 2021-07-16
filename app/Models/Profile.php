<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';
    protected $casts = [
        'facebook' => 'string',
        'whatsup' => 'string',
        'viber' => 'string',
        'telegram' => 'string',
        'numbers'=> 'string',
        
    ];
    public function user(){
       return $this->belongsTo(User::class);
   }
   public function hasProfileStatus($profile_status)
    {
        return $this->profile_status == $profile_status;
    }
    
}

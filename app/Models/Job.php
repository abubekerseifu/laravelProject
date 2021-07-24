<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'job';
    protected $primaryKey = 'job_id';
    protected $casts = [
        'facebook' => 'string',
        'whatsup' => 'string',
        'viber' => 'string',
        'telegram' => 'string',
        'phnumber'=> 'string',
    ];
    public function user(){
       return $this->belongsTo(User::class);
   }
    
}


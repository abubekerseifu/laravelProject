<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        'user_id','babysitter_make_p','always_approve'
    ];
    public function user(){
       return $this->belongsTo(User::class);
   }
}

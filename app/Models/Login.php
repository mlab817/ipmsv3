<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $fillable = [
    	'user_id',
    	'login_at'
    ];

    public function user() 
    {
    	return $this->belongsTo(User::class);
    }
}

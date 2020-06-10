<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingEndorsement extends Model
{
	use SoftDeletes;
	
    // model for persisting projects for endorsement
    protected $fillable = [
    	'user_id',
    	'projects'
    ];

    protected $casts = [
    	'projects' => 'array'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrexcActivity extends Model
{
    protected $fillable = [
    	'name',
    	'acronym',
    	'prexc_subprogram_id'
    ];
}

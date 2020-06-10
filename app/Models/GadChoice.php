<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class GadChoice extends Model
{
    protected $fillable = [
    	'id',
    	'name',
    	'value'
    ];

    public function gad_subquestions(): BelongsToMany
    {
    	return $this->belongsToMany(GadSubquestion::class,'gad_subquestion_choice','gad_choice_id','gad_subquestion_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GadQuestion extends Model
{
    protected $fillable = [
    	'id',
    	'name'
    ];

    public function gad_subquestions(): HasMany
    {
    	return $this->hasMany(GadSubquestion::class);
    }
}

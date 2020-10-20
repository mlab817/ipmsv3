<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BelongsTo;
use Illuminate\Database\Eloquent\BelongsToMany;

class PrexcActivity extends Model
{
    protected $fillable = [
    	'name',
    	'acronym',
    	'prexc_subprogram_id'
    ];

    public function prexc_subprogram(): BelongsTo
    {
    	return $this->belongsTo(PrexcSubprogram::class);
    }

    public function operating_units(): BelongsToMany
    {
    	return $this->belongsToMany(OperatingUnit::class,'operating_unit_prexc_activity','prexc_activity_id','operating_unit_id','id','id');
    }
}

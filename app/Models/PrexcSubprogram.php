<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrexcSubprogram extends Model
{
    protected $fillable = [
    	'name',
    	'acronym',
    	'prexc_program_id',
      'title',
      'organizational_outcome',
      'objective_statement',
      'program_strategy',
      'outcome_indicators',
      'output_indicators',
    ];

    public function prexc_activities(): HasMany
    {
    	return $this->hasMany(PrexcActivity::class);
    }

    public function children(): HasMany
    {
    	return $this->hasMany(PrexcActivity::class);
    }

    public function prexc_program(): BelongsTo
    {
    	return $this->belongsTo(PrexcProgram::class);
    }
}

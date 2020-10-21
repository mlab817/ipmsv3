<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PrexcProgram extends Model
{
    protected $fillable = [
    	'name',
    	'acronym',
      'uacs_code',
    	'cost_structure_id',
      'title',
      'organizational_outcome',
      'objective_statement',
      'program_strategy',
    ];

    public function prexc_subprograms(): HasMany
    {
    	return $this->hasMany(PrexcSubprogram::class);
    }

    public function children(): HasMany
    {
    	return $this->hasMany(PrexcSubprogram::class);
    }

    public function cost_structure(): BelongsTo
    {
    	return $this->belongsTo(CostStructure::class);
    }

    public function operating_units(): BelongsToMany
    {
      return $this->belongsToMany(OperatingUnit::class);
    }

    public function getLabelAttribute()
    {
      return $this->uacs_code . '_'. $this->name;
    }
}

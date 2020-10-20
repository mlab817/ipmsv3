<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrexcProgram extends Model
{
    protected $fillable = [
    	'name',
    	'acronym',
    	'cost_structure_id'
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
}

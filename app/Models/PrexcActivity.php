<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PrexcActivity extends Model
{
    protected $fillable = [
    	'name',
    	'acronym',
    	'prexc_subprogram_id',
    	'uacs_code',
    ];

    public function prexc_subprogram(): BelongsTo
    {
    	return $this->belongsTo(PrexcSubprogram::class);
    }

    public function operating_units(): BelongsToMany
    {
    	return $this->belongsToMany(OperatingUnit::class,'operating_unit_prexc_activity','prexc_activity_id','operating_unit_id','id','id');
    }

    public function getLabelAttribute()
    {
      return $this->uacs_code . '_'. $this->name;
    }

    public function prexc_activity_financials(): HasMany
    {
        return $this->hasMany(PrexcActivityFinancial::class);
    }
}

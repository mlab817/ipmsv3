<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activity extends Model
{
    //

    public function operating_units(): BelongsToMany
    {
      return $this->belongsToMany(OperatingUnit::class,'operating_unit_activity','activity_id','id');
    }

    public function subprogram(): BelongsTo
    {
      return $this->belongsTo(Subprogram::class);
    }
}

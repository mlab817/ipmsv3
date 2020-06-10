<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tier extends Model
{
    use SoftDeletes;

    public function projects(): HasMany
    {
      return $this->hasMany(Project::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocioeconomicAgenda extends Model
{ 
    use SoftDeletes;

    protected $fillable = [
      'name'
    ];

    public function projects(): BelongsToMany
    {
      return $this->belongsToMany(Project::class);
    }
}

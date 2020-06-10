<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    protected $fillable = [
      'project_id',
      'region_id'
    ];

    public function projects(): BelongsToMany
    {
      return $this->belongsToMany(Project::class,'project_region','project_id','region_id');
                  // ->withPivot('target_2016','target_2017','target_2018','target_2019','target_2020','target_2021','target_2022','target_2023','target_total');
    }

    public function provinces(): HasMany
    {
      return $this->hasMany(Province::class);
    }

}

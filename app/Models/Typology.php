<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Typology extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
      'name',
      'label'
    ];

    public function projects()
    {
      return $this->hasMany(Project::class);
    }
}

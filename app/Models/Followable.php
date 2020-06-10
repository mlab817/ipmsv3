<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Followable extends Model
{
    protected $fillable = [
      'user_id',
      'followable_type',
      'followable_id'
    ];

    public function followable()
    {
      return $this->morphTo();
    }
}

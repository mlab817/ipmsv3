<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
      'id',
      'name',
      'ident',
      'description',
      'active',
      'level'
    ];

    protected $casts = [
      'active' => 'bool',
      'level' => 'int'
    ];

    public function users(): HasMany
    {
      return $this->hasMany(User::class);
    }

    // public function permissions()
    // {
    //   return $this->belongsToMany(Permission::class,'role_permissions','role_id','permission_id');
    // }

    // public function users(): BelongsToMany
    // {
    //   return $this->belongsToMany(User::class,'user_roles','role_id','user_id');
    // }
}

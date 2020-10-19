<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class OperatingUnit extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'id',
      'operating_unit_type_id',
      'name',
      'acronym',
      'address',
      'image',
      'agency_head_name',
      'agency_head_designation',
      'telephone_number',
      'fax_number',
      'email'
    ];

    public function activities()
    {
      return $this->belongsToMany(Activity::class,'operating_unit_activity','operating_unit_id','activity_id');
    }

    public function operating_unit_type(): BelongsTo
    {
      return $this->belongsTo(OperatingUnitType::class);
    }

    public function profile(): HasMany
    {
      return $this->hasMany(Profile::class,'operating_unit_id','id');
    }

    public function projects(): HasMany
    {
      return $this->hasMany(Project::class);
    }

    public function users(): HasMany
    {
      return $this->hasMany(User::class);
    }

    public function reviewers(): BelongsToMany
    {
      return $this->belongsToMany(User::class,'operating_unit_reviewer','operating_unit_id','user_id');
    }

    public function getCountProjectAttribute(): Int
    {
      return (int) $this->projects()->count();
    }

    public function getImageUrlAttribute()
    {
      return $this->image ? Storage::url($this->image) : null;
    }

    public function focals(): HasMany
    {
      return $this->hasMany(User::class,'operating_unit_id','id');
    }

    public function viewers(): BelongsToMany
    {
      return $this->belongsToMany(User::class,'operating_unit_viewer','operating_unit_id','user_id');
    }

    public function getTotalInvestmentAttribute()
    {
      return $this->projects()->sum('investment_target_total') ?? 0; // showing 0 only
    }

    public function getInvestmentTarget2016Attribute()
    {
        return $this->projects()->sum('investment_target_2016') ?? 0; // showing 0 only
    }

    public function getInvestmentTarget2017Attribute()
    {
        return $this->projects()->sum('investment_target_2017') ?? 0; // showing 0 only
    }

    public function getInvestmentTarget2018Attribute()
    {
        return $this->projects()->sum('investment_target_2018') ?? 0; // showing 0 only
    }

    public function getInvestmentTarget2019Attribute()
    {
        return $this->projects()->sum('investment_target_2019') ?? 0; // showing 0 only
    }

    public function getInvestmentTarget2020Attribute()
    {
        return $this->projects()->sum('investment_target_2020') ?? 0; // showing 0 only
    }

    public function getInvestmentTarget2021Attribute()
    {
        return $this->projects()->sum('investment_target_2021') ?? 0; // showing 0 only
    }

    public function getInvestmentTarget2022Attribute()
    {
        return $this->projects()->sum('investment_target_2022') ?? 0; // showing 0 only
    }

    public function getInvestmentTarget2023Attribute()
    {
        return $this->projects()->sum('investment_target_2023') ?? 0; // showing 0 only
    }
}

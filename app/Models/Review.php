<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  protected $fillable = [
  	'project_id',
  	'typology_id',
  	'cip',
  	'cip_type_id',
  	'trip',
  	'within_period',
  	'readiness_id',
  	'reviewed_by',
  	'remarks'
  ];
  
	public function project(): BelongsTo
	{
		return $this->belongsTo(Project::class);
	}

	public function cip_type(): BelongsTo
	{
		return $this->belongsTo(CipType::class);
	}

	public function typology(): BelongsTo
	{
		return $this->belongsTo(Typology::class);
	}

	public function reviewer(): BelongsTo
	{
		return $this->belongsTo(User::class,'reviewed_by','id');
	}

	public function readiness(): BelongsTo
	{
		return $this->belongsTo(Readiness::class);
	}
}

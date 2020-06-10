<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class ProjectGadSubquestion extends Model
{
		protected $fillable = [
			'project_id',
			'gad_subquestion_id',
			'gad_choice_id'
		];

    public function gad_choice(): BelongsTo
    {
    		return $this->belongsTo(GadChoice::class,'gad_choice_id','id');
    }

    public function gad_subquestion(): BelongsTo
    {
    		return $this->belongsTo(GadSubquestion::class,'gad_subquestion_id','id');
    }

    public function project(): BelongsTo
    {
    		return $this->belongsTo(Project::class,'project_id','id');
    }
}

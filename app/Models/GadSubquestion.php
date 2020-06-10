<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class GadSubquestion extends Model
{
    protected $fillable = [
    	'id',
    	'name',
    	'gad_question_id'
    ];

    public function gad_question(): BelongsTo
    {
    	return $this->belongsTo(GadQuestion::class);
    }

    public function gad_choices(): BelongsToMany
    {
    	return $this->belongsToMany(GadChoice::class,'gad_subquestion_choice','gad_subquestion_id','gad_choice_id');
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class,'project_gad_answers','gad_subquestion_id','project_id')
                    ->using(ProjectGadSubquestion::class)
                    ->withPivot('gad_choice_id');
    }
}

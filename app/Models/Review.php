<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

		// BelongsToMany Relations
		public function sustainable_development_goals(): BelongsToMany
		{
			return $this->belongsToMany(SustainableDevelopmentGoal::class,'review_sdg','sdg_id','review_id');
		}

		public function ten_point_agenda(): BelongsToMany
		{
			return $this->belongsToMany(TenPointAgenda::class,'review_tpa','tpa_id','review_id');
		}

		public function bases(): BelongsToMany
		{
			return $this->belongsToMany(Basis::class,'review_basis','basis_id','review_id');
		}

		public function paradigms(): BelongsToMany
		{
			return $this->belongsToMany(Paradigm::class,'review_paradigm','paradigm_id','review_id');
		}

		public function pdp_indicators(): BelongsToMany
		{
			return $this->belongsToMany(PdpIndicator::class,'review_pdp_indicator','pdp_indicator_id','review_id');
		}

		public function pdp_chapters(): BelongsToMany
		{
			return $this->belongsToMany(PdpChapter::class,'review_pdp_chapter','pdp_chapter_id','review_id');
		}
}

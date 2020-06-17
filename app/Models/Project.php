<?php

namespace App\Models;

use App\Scopes\ProjectScope;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;

class Project extends Model
{
    use SoftDeletes, LogsActivity;

    protected static $logFillable = true;

    protected static $logName = 'system';

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This project has been {$eventName}";
    }

    protected static function boot()
    {
      parent::boot();

      static::creating(function ($project) {
          $project->uuid = Str::uuid();
      });

      static::addGlobalScope(new ProjectScope);
    }

    protected $fillable = [
      "pipol_url",
      "pipol_code",
      "afmip",
      "pip",
      "cip",
      "trip",
      "rdip",
      "pcip",
      "title",
      "type_id",
      "regular",
      "infrastructure",
      "operating_unit_id",
      "main_funding_source_id",
      "funding_institution_id",
      "implementation_mode_id",
      "priority_ranking",
      "project_status_id",
      "total_project_cost",
      "currency_id",
      "typology_id",
      "tier_id",
      "spatial_coverage_id",
      "region_id",
      "province_id",
      "district_id",
      "city_municipality_id",
      "cities_municipalities",
      "clearinghouse",
      "clearinghouse_date",
      'neda_submission',
      'neda_submission_date',
      'neda_secretariat_review',
      'neda_secretariat_review_date',
      'icc_endorsed',
      'icc_endorsed_date',
      'icc_approved',
      'icc_approved_date',
      'neda_board',
      'neda_board_date',
      "has_fs",
      'fs_target_2017',
      'fs_target_2018',
      'fs_target_2019',
      'fs_target_2020',
      'fs_target_2021',
      'fs_target_2022',
      'fs_target_total',
      "description",
      'components',
      "goals",
      "outcomes",
      "purpose",
      "expected_outputs",
      "beneficiaries",
      "employment_generated",
      "target_start_year",
      "target_end_year",
      "implementation_start_date",
      "implementation_end_date",
      "status_update",
      "readiness_level",
      "implementation_risk",
      "mitigation_strategy",
      "income_increase",
      "gad_id",
      "main_funding_source_id",
      "funding_institution_id",
      "has_row",
      'row_target_2017',
      'row_target_2018',
      'row_target_2019',
      'row_target_2020',
      'row_target_2021',
      'row_target_2022',
      'row_target_total',
      'row_affected',
      "has_rap",
      'rap_target_2017',
      'rap_target_2018',
      'rap_target_2019',
      'rap_target_2020',
      'rap_target_2021',
      'rap_target_2022',
      'rap_target_total',
      'rap_affected',
      'investment_target_2016',
      'investment_target_2017',
      'investment_target_2018',
      'investment_target_2019',
      'investment_target_2020',
      'investment_target_2021',
      'investment_target_2022',
      'investment_target_2023',
      'investment_target_total',
      'infrastructure_target_2016',
      'infrastructure_target_2017',
      'infrastructure_target_2018',
      'infrastructure_target_2019',
      'infrastructure_target_2020',
      'infrastructure_target_2021',
      'infrastructure_target_2022',
      'infrastructure_target_2023',
      'infrastructure_target_total',
      'nep_2016',
      'nep_2017',
      'nep_2018',
      'nep_2019',
      'nep_2020',
      'nep_2021',
      'nep_2022',
      'nep_2023',
      'nep_total',
      'gaa_2016',
      'gaa_2017',
      'gaa_2018',
      'gaa_2019',
      'gaa_2020',
      'gaa_2021',
      'gaa_2022',
      'gaa_2023',
      'gaa_total',
      'disbursement_2016',
      'disbursement_2017',
      'disbursement_2018',
      'disbursement_2019',
      'disbursement_2020',
      'disbursement_2021',
      'disbursement_2022',
      'disbursement_2023',
      'disbursement_total',
      "estimated_project_life",
      "financial_benefit_cost_ratio",
      "financial_internal_rate_return",
      "financial_net_present_value",
      "economic_benefit_cost_ratio",
    	"economic_internal_rate_return",
      "economic_net_present_value",
      "gad_form_id",
      "updates",
      "updates_date",
      'created_by',
      'technical_readiness_id',
      'rdc_endorsed',
      'rdc_endorsed_date',
      'rdc_required'
    ];

    protected $casts = [
      'can_update' => 'boolean'
    ];

    public function bases(): BelongsToMany
    {
      return $this->belongsToMany(Basis::class,'project_basis');
    }

    public function commodities(): BelongsToMany
    {
      return $this->belongsToMany(Commodity::class);
    }

    public function currency(): BelongsTo
    {
      return $this->belongsTo(Currency::class);
    }

    public function creator(): BelongsTo
    {
      return $this->belongsTo(User::class,'created_by','id');
    }

    public function challenges(): BelongsToMany
    {
      return $this->belongsToMany(Challenge::class);
    }

    public function deleter(): BelongsTo
    {
      return $this->belongsTo(User::class,'deleted_by','id');
    }

    public function districts(): BelongsToMany
    {
      return $this->belongsToMany(District::class,"project_district","project_id","district_id");
    }

    public function funding_institution(): BelongsTo
    {
      return $this->belongsTo(FundingInstitution::class,'funding_institution_id','id');
    }

    public function main_funding_source(): BelongsTo
    {
      return $this->belongsTo(FundingSource::class,'main_funding_source_id','id');
    }

    public function funding_sources(): BelongsToMany
    {
      return $this->belongsToMany(FundingSource::class,'project_funding_source')
      ->withPivot('target_2016','target_2017','target_2018','target_2019','target_2020','target_2021','target_2022','target_2023','target_total');
    }

    public function implementation_mode(): BelongsTo
    {
      return $this->belongsTo(Project::class);
    }

    public function operating_unit(): BelongsTo
    {
      return $this->belongsTo(OperatingUnit::class);
    }

    public function other_implementing_agencies(): BelongsToMany
    {
      return $this->belongsToMany(OperatingUnit::class,'project_implementing_agency','project_id','operating_unit_id');
    }

    public function paradigms(): BelongsToMany
    {
      return $this->belongsToMany(Paradigm::class,'project_paradigm','project_id','paradigm_id');
    }

    public function programs(): BelongsToMany
    {
      return $this->belongsToMany(Program::class);
    }

    public function project_status(): BelongsTo
    {
      return $this->belongsTo(ProjectStatus::class);
    }

    public function provinces(): BelongsToMany
    {
      return $this->belongsToMany(Province::class);
    }

    public function regions(): BelongsToMany
    {
      return $this->belongsToMany(Region::class,'project_region','project_id','region_id');
    }

    public function region_financials(): HasMany
    {
      return $this->hasMany(RegionFinancial::class);
    }

    public function socioeconomic_agendas(): BelongsToMany
    {
      return $this->belongsToMany(SocioeconomicAgenda::class,'project_agenda','project_id','socioeconomic_agenda_id');
    }

    public function spatial_coverage(): BelongsTo
    {
      return $this->belongsTo(SpatialCoverage::class);
    }

    public function sustainable_development_goals(): BelongsToMany
    {
      return $this->belongsToMany(SustainableDevelopmentGoal::class,'project_sdg','project_id','sdg_id','id','id');
    }

    public function technical_readiness(): BelongsTo
    {
      return $this->belongsTo(TechnicalReadiness::class);
    }

    public function technical_readinesses(): BelongsToMany
    {
      return $this->belongsToMany(TechnicalReadiness::class,'project_technical_readiness','project_id','tr_id');
    }

    public function ten_point_agenda(): BelongsToMany
    {
      return $this->belongsToMany(TenPointAgenda::class);
    }

    public function tier(): BelongsTo
    {
      return $this->belongsTo(Tier::class);
    }

    public function type(): BelongsTo
    {
      return $this->belongsTo(Type::class);
    }

    public function typology(): BelongsTo
    {
      return $this->belongsTo(Typology::class);
    }

    public function updater(): BelongsTo
    {
      return $this->belongsTo(User::class,'updated_by','id');
    }

    /**
     * Accessors for many-to-many relations
     *
     * @return void
     */
    public function getSelectedBasesAttribute()
    {
      return $this->bases ?? $this->bases->pluck('id');
    }

    public function getSelectedDistrictsAttribute()
    {
      return $this->districts ?? $this->districts->pluck('id');
    }

    public function getSelectedProvincesAttribute()
    {
      return $this->provinces ?? $this->provinces->pluck('id');
    }

    public function getSelectedRegionsAttribute()
    {
      return $this->regions ?? $this->regions->pluck('id');
    }

    public function getSelectedTechnicalReadinessesAttribute()
    {
      return $this->technical_readinesses ?? $this->technical_readinesses->pluck('id');
    }

    public function getSelectedSustainableDevelopmentGoalsAttribute()
    {
      return $this->sustainable_development_goals ?? $this->sustainable_development_goals->pluck('id');
    }

    public function getSelectedParadigmsAttribute()
    {
      return $this->paradigms ?? $this->paradigms->pluck('id');
    }

    public function getSelectedTenPointAgendaAttribute()
    {
      return $this->ten_point_agenda ?? $this->ten_point_agenda->pluck('id');
    }

    public function getSelectedPdpChaptersAttribute()
    {
      return $this->pdp_chapters ?? $this->pdp_chapters->pluck('id');
    }

    public function getSelectedPdpIndicatorsAttribute()
    {
      return $this->pdp_indicators ?? $this->pdp_indicators->pluck('id');
    }

    /**
     * Attribute for when a user can update this project.
     *
     * @return Boolean
     */
    public function getCanUpdateAttribute()
    {
      $userId = auth()->user()->id;

      return $this->created_by == $userId;
    }

    public function activities(): MorphMany
    {
      return $this->morphMany(\Spatie\Activitylog\Models\Activity::class,'subject');
    }

    public function city_municipality(): BelongsTo
    {
      return $this->belongsTo(CityMunicipality::class);
    }

    public function district(): BelongsTo
    {
      return $this->belongsTo(District::class);
    }

    public function province(): BelongsTo
    {
      return $this->belongsTo(Province::class);
    }

    public function region(): BelongsTo
    {
      return $this->belongsTo(Region::class);
    }

    public function start_year(): BelongsTo
    {
      return $this->belongsTo(Year::class,'target_start_year','id');
    }

    public function end_year(): BelongsTo
    {
      return $this->belongsTo(Year::class,'target_end_year','id');
    }

    public function endorser(): BelongsTo
    {
        return $this->belongsTo(User::class,'endorsed_by');
    }
    public function endorsement(): BelongsTo
    {
        return $this->belongsTo(Endorsement::class);
    }

    public function review(): HasOne
    {
      return $this->hasOne(Review::class);
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class,'reviewed_by','id');
    }

    public function gad(): BelongsTo
    {
        return $this->belongsTo(Gad::class);
    }

    public function finalizer(): BelongsTo
    {
        return $this->belongsTo(User::class,'finalized_by');
    }

    public function project_processing_statuses(): HasMany
    {
      return $this->hasMany(ProjectProcessingStatus::class,'project_id','id');
    }

    public function project_gad_subquestions(): HasMany
    {
      return $this->hasMany(ProjectGadSubquestion::class,'project_id','id');
    }

    public function funding_source_financials(): HasMany
    {
      return $this->hasMany(FundingSourceFinancial::class,'project_id','id');
    }

    public function pdp_chapters(): BelongsToMany
    {
      return $this->belongsToMany(PdpChapter::class,'project_pdp_chapter','project_id','pdp_chapter_id');
    }

    public function pdp_indicators(): BelongsToMany
    {
      return $this->belongsToMany(PdpIndicator::class,'project_pdp_indicators','project_id','pdp_indicator_id');
    }

    public function latest_processing_status(): HasOne
    {
      return $this->hasOne(ProjectProcessingStatus::class)->latest();
    }

    public function getLatestStatusAttribute()
    {
      if ($this->latest_processing_status != null) {
        return $this->latest_processing_status->processing_status->name;
      }
      return null;
    }

    public function processing_status(): BelongsTo
    {
      return $this->belongsTo(ProcessingStatus::class);
    }

    public function gad_form(): BelongsTo
    {
      return $this->belongsTo(GadForm::class);
    }

    /**
     * Local Scopes 
     * 
     */
    public function scopeDraft($query)
    {
      return $query->where('processing_status_id','=',1);
    }

    public function scopeFinalized($query)
    {
      return $query->where('processing_status_id','=',2);
    }

    public function scopeEndorsed($query)
    {
      return $query->where('processing_status_id','=',3);
    }

    public function scopeReturned($query)
    {
      return $query->where('processing_status_id','=',4);
    }

    public function scopeValidated($query)
    {
      return $query->where('processing_status_id','=',5);
    }

    public function scopeReviewed($query)
    {
      return $query->where('processing_status_id','=',6);
    }

    public function scopeAccepted($query)
    {
      return $query->where('processing_status_id','=',7);
    }

    public function scopeApproved($query)
    {
      return $query->where('processing_status_id','=',8);
    }

    public function scopeEncoded($query)
    {
      return $query->where('processing_status_id','=',9);
    }

    public function scopeWhereProcessingStatus($query, $value)
    {
      return $query->where('processing_status_id','=',$value);
    }

}

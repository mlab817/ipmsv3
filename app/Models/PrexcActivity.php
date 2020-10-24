<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrexcActivity extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'name',
      'operating_unit_id',
      'prexc_program_id',
      'prexc_subprogram_id',
      'banner_program_id',
      'uacs_code',
      'investment_target_2016,'
      'investment_target_2017,'
      'investment_target_2018,'
      'investment_target_2019,'
      'investment_target_2020,'
      'investment_target_2021,'
      'investment_target_2022,'
      'investment_target_2023,'
      'investment_target_2024,'
      'investment_target_2025,'
      'investment_target_total,'
      'infrastructure_target_2016,'
      'infrastructure_target_2017,'
      'infrastructure_target_2018,'
      'infrastructure_target_2019,'
      'infrastructure_target_2020,'
      'infrastructure_target_2021,'
      'infrastructure_target_2022,'
      'infrastructure_target_2023,'
      'infrastructure_target_2024,'
      'infrastructure_target_2025,'
      'infrastructure_target_total,'
      'gaa_2016',
      'gaa_2017',
      'gaa_2018',
      'gaa_2019',
      'gaa_2020',
      'gaa_2021',
      'gaa_2022',
      'gaa_2023',
      'gaa_2024',
      'gaa_2025',
      'gaa_total',
      'nep_2016',
      'nep_2017',
      'nep_2018',
      'nep_2019',
      'nep_2020',
      'nep_2021',
      'nep_2022',
      'nep_2023',
      'nep_2024',
      'nep_2025',
      'nep_total',
      'disbursement_2016',
      'disbursement_2017',
      'disbursement_2018',
      'disbursement_2019',
      'disbursement_2020',
      'disbursement_2021',
      'disbursement_2022',
      'disbursement_2023',
      'disbursement_2024',
      'disbursement_2025',
      'disbursement_total',
    ];

    public function banner_program(): BelongsTo
    {
      return $this->belongsTo(BannerProgram::class);
    }

    public function prexc_program(): BelongsTo
    {
      return $this->belongsTo(PrexcProgram::class);
    }

    public function prexc_subprogram(): BelongsTo
    {
    	return $this->belongsTo(PrexcSubprogram::class);
    }

    public function operating_units(): BelongsToMany
    {
    	return $this->belongsToMany(OperatingUnit::class,'operating_unit_prexc_activity','prexc_activity_id','operating_unit_id','id','id');
    }

    public function getLabelAttribute()
    {
      return $this->uacs_code . '_'. $this->name;
    }

}

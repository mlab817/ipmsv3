<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegionFinancial extends Model
{
    protected $fillable = [
        'project_id',
        'region_id',
        'target_2016',
        'target_2017',
        'target_2018',
        'target_2019',
        'target_2020',
        'target_2021',
        'target_2022',
        'target_2023',
        'target_total',
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
    ];


    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}

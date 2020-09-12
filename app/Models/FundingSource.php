<?php

namespace App\Models;

use App\Traits\HasInvestmentsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class FundingSource extends Model
{
    use SoftDeletes, HasInvestmentsTrait;

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class,'project_funding_source')
            ->withPivot('target_2016','target_2017','target_2018','target_2019','target_2020','target_2021','target_2022','target_2023','target_total');
    }
}

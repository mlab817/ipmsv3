<?php

namespace App\GraphQL\Queries;

use App\Models\PrexcActivity;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ConsolidatedActivitiesQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        $prexc_activities = null;

        $link = null;
        $user = $context->user();

        $ou = $user->operating_unit;
        $conso = $ou->consolidates;

        if (!empty($conso)) {
           $prexc_activities = PrexcActivity::withoutGlobalScopes()->whereIn('banner_program_id',$conso->pluck('id')->get();
        }

        return [
          'prexc_activities' = $prexc_activities;
        ];
    }
}

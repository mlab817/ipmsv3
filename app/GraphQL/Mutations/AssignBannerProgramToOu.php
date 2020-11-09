<?php

namespace App\GraphQL\Mutations;

use App\Models\BannerProgram;
use App\Models\OperatingUnit;

class AssignBannerProgramToOu
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $operating_unit = OperatingUnit::find($args['operating_unit_id']);

        if (! $operating_unit) {
          return null;
        }

        $banner_programs = BannerProgram::whereIn('id',$args['banner_program_id'])->get();

        if (! $banner_programs) {
          return null;
        }

        $operating_unit->consolidates()->sync($banner_programs);

        return $operating_unit;
    }
}

<?php

namespace App\GraphQL\Mutations;

use App\Exports\PrexcActivityExport;
use Illuminate\Support\Facades\Storage;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ExportForConsolidation
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        $link = null;
        $user = $context->user();

        log($user);

        $ou = $user->operating_unit;
        $pa = $ou->consolidates->banner_programs->prexc_activities;
        $filename = 'exports/'. time() . '_export.xlsx';

        $excel = (new PrexcActivityExport($pa))->store($filename, 'public');

        if ($excel) {
            $link = config('app.url') . Storage::url($filename);
        }

        return [
            'link' => $link,
        ];
    }
}

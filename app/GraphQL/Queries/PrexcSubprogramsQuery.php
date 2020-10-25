<?php

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\Log;
use App\Models\PrexcSubprogram;

class PrexcSubprogramsQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
     public function __invoke($_, array $args)
     {
         $prexc_subprograms = [];

         $user = auth()->user();

         if ($user->role && $user->role->name === 'encoder') {
           $ou = $user->operating_unit;

           $prexc_subprograms = $ou->$prexc_subprograms;
           Log::critical(json_encode($prexc_subprograms));
         } else {
           $prexc_subprograms = PrexcSubprogram::all();
         }

         return $prexc_subprograms;
     }
}

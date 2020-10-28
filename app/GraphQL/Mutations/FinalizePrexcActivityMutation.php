<?php

namespace App\GraphQL\Mutations;

use App\Models\PrexcActivity;
use Carbon\Carbon;

class FinalizePrexcActivityMutation
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $prexc_activity = PrexcActivity::find($args['id']);

        if (! $prexc_activity) {
          return null;
        }

        $prexc_activity->finalized = true;
        $prexc_activity->finalized_by = $context->user()->id;
        $prexc_activity->finalized_at = Carbon::now();
        $prexc_activity->save();

        return $prexc_activity;
    }
}

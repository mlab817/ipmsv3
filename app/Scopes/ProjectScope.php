<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ProjectScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        // get the currently authenticated user
        $user = auth()->user();

        if (!$user) {
            $builder->where('id',null);
        }

        else {
            // Check if user is guest
            if ($user->role->name == 'guest') {
                // Do not return any project
                $builder->where('id',null);
            }

            //    Check if user is superadmin or admin
            //if ($user->role_id == 1 || $user->role_id == 2) {
               // Do not return any project
             //  $builder->where('id',null);
            // }

            // Check if user is reviewer
            if ($user->role->name == 'reviewer') {
                $reviews = $user->reviews;
                // Get projects of operating unit being reviewed where status is endorsed
                $builder->whereIn('operating_unit_id',$reviews);
            }

            // Check if user is encoder
            if ($user->role->name == 'encoder') {
                // get all projects encoded by operating unit
                if ($user->operating_unit_id) {
                  $builder->where('operating_unit_id',$user->operating_unit_id)
                    ->orWhere('created_by',$user->id);
                } else {
                  $builder->where('created_by',$user->id);
                }
                
            }

            if ($user->role->name == 'viewer') {
                $reviews = $user->views;
                // get all projects that can be viewed by user and status is endorsed
                $builder->whereIn('operating_unit_id',$reviews);
            }
        }
    }
}

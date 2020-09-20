<?php

namespace App\GraphQL\Mutations;

use App\Models\OperatingUnit;
use App\User;

class AssignReviewer
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
    		$status = 'ERROR';
    		$message = 'Something went wrong';

        $ou = OperatingUnit::find($args['operating_unit_id']);
        $user = User::find($args['user_id']);

        if ($ou && $user) {
        	

        	if ($user->role && $user->role->name == 'reviewer') {
        		$ou->reviewers()->sync($user);
        		$status = 'SUCCESS';
        		$message = 'Successfully assigned reviewer';
        	} else {
        		$message = 'User not a reviewer';
        		$ou = null;
        	}
        } else {
        	$message = 'Operating unit or user not found';
        	$ou = null;
        }

        return [
        	'message' => $message,
        	'status' => $status,
        	'operating_unit' => $ou
        ];
    }
}

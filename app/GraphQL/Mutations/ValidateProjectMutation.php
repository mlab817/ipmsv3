<?php

namespace App\GraphQL\Mutations;

use App\Models\ProcessingStatus;
use App\Models\Project;
use App\Models\ProjectProcessingStatus;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ValidateProjectMutation
{
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        // Check if the user is a reviewer
        $user = $context->user();

        // if user is not reviewer
        if ($user->role->name !== 'reviewer') {
            return null;
        } else {
            $project = Project::find($args['id']);

            if (!$project) {
                return null;
            } else {
                $processing_status = ProcessingStatus::where('name','returned')->first();

                $validation_data = $args['validation_data'] ?? false;
                $validation_signed = $args['validation_signed'] ?? false;
                $validation_endorsed = $args['validation_endorsed'] ?? false;

                $processing_status_id = null;

                // if any of the validation is false, return the project else validate
                if (!$validation_data || !$validation_signed || !$validation_endorsed) {
                    $processing_status = ProcessingStatus::where('name','returned')->first();
                    $processing_status_id = $processing_status->id;                    
                } else {
                    $processing_status = ProcessingStatus::where('name','validated')->first();
                    $processing_status_id = $processing_status->id;
                }

                // unfinalize to allow edit
                // also need to changed signed copy since this will cause changes
                if (!$validation_data) {
                    $project->finalized = false;
                    $project->signed_copy = null;
                    $project->endorsed = false;
                }

                $project->processing_status_id = $processing_status_id;
                // if validation data is false, encoder must be able to update data
                $project->validation_data = $validation_data;

                // if the signed copy is not present or invalid, user should change signed validation
                $project->validation_signed = $validation_signed;

                // remove signed copy
                if (!$validation_signed) {
                    $project->signed_copy = null;
                }

                // if the project is not included in endorsement, re-endorse
                $project->validation_endorsed = $validation_endorsed;

                // revert to un-endorsed status
                if (!$validation_endorsed) {
                    $project->endorsed = false;
                }

                $project->processed_by = $user->id;
                $project->save();

                ProjectProcessingStatus::create([
                    'project_id' => $project->id,
                    'processing_status_id' => $processing_status_id,
                    'processed_by' => $user->id,
                    'remarks' => $args['remarks']
                ]);

                // notify encoder

                return $project;
            }
        }
    }
}

<?php

namespace App\GraphQL\Mutations;

use App\Models\Project;
use App\Models\ProjectProcessingStatus;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ReturnProjectMutation
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
        // Let's check if the user is a reviewer
        $user = $context->user();

        if ($user->role->name !== 'reviewer') {
            return null;
        } else {
            $project = Project::find($args['project_id']);

            if (!$project) {
                return null;
            } else {
                $project->processing_status_id = 4;
                $project->processed_by = $user->id;
                $project->save();

                ProjectProcessingStatus::create([
                    'project_id' => $project->id,
                    'processing_status_id' => 4,
                    'processed_by' => $user->id,
                    'remarks' => $args['remarks']
                ]);

                return $project;
            }
        }
    }
}

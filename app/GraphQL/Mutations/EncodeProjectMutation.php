<?php

namespace App\GraphQL\Mutations;

use App\Models\Project;
use App\Models\ProjectProcessingStatus;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class EncodeProjectMutation
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
        $project = Project::find($args['project_id']);

        if (!$project) {
            return null;
        }

        if ($project->processing_status_id != 8) {
            return null;
        }

        if (!$args['pipol_id'] || !$args['pipol_code'] || !$args['remarks']) {
            return null;
        }

        $project->pipol_code = $args['pipol_code'];
        $project->pipol_id = $args['pipol_id'];
        $project->processing_status_id = 2;
        $project->processed_by = $context->user()->id;
        $project->save();

        ProjectProcessingStatus::create([
            'project_id' => $args['project_id'],
            'processing_status_id' => 9,
            'processed_by' => $context->user()->id,
            'remarks' => $args['remarks']
        ]);

        return $project;
    }
}

<?php

namespace App\GraphQL\Mutations;

use App\Models\Project;
use App\Models\Review;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class SaveReview
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
        

        // initialize variables
        $message = 'An error occurred';
        $status = 'FAILED';

        // retrieve Project
        $project = Project::find($args['id']);

        if (!$project) {
            $message = 'Project not found.';
        } else {
            $review = Review::create([
                'project_id' => $project->id,
                'typology_id' => $args['typology_id'],
                'cip' => $args['cip'],
                'cip_type_id' => $args['cip_type_id'],
                'trip' => $args['trip'],
                'within_period' => $args['within_period'],
                'readiness_id' => $args['readiness_id'],
                'remarks' => $args['remarks'],
                'reviewed_by' => $context->user()->id
            ]);

            if ($review) {
                $review->sync($args['sustainable_development_goals']);
                $review->sync($args['ten_point_agenda']);
                $review->sync($args['bases']);
                $review->sync($args['paradigms']);
                $review->sync($args['pdp_indicators']);
                $review->sync($args['pdp_indicators']);

                $message = 'Successfully saved review';
                $status = 'SUCCESS';
            } else {
                $message = 'Failed to save review.';
            }
        }

        return [
            'review' => $review,
            'message' => $message,
            'status' => $status
        ];
    }
}

<?php

namespace App\GraphQL\Mutations;

use App\Models\Project;
use App\Models\ProjectProcessingStatus;
use Carbon\Carbon;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class FinalizeProjectMutation
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
        // TODO implement the resolver
        $project = Project::find($args['project_id']);

        if (!$project) {
            return null;    
        } else {
            // if a signed copy is uploaded, upload it to Dropbox and return the link only
            if (isset($args['signed_copy'])) {
                $file = $args['signed_copy'];

                // $uploadedFile = $file->storePublicly('uploads');
                $uploadedFile = Storage::disk('dropbox')->put('signed copies',$file);

                $link = Storage::disk('dropbox')
                  ->getDriver() // `\League\Flysystem\Flysystem` instance
                  ->getAdapter() // `\Spatie\FlysystemDropbox\DropboxAdapter` instance
                  ->getClient() // `\Spatie\Dropbox\Client` instance
                  ->createSharedLinkWithSettings($uploadedFile);
                $url = $link['url'];
                $rawUrl = Str::replaceLast("dl=0","raw=1",$url);

                $project->signed_copy = $rawUrl;
            }

            $project->processing_status_id = 2;
            $project->processed_by = $context->user()->id;
            $project->save();

            ProjectProcessingStatus::create([
                'project_id' => $args['project_id'],
                'processing_status_id' => 2,
                'processed_by' => $context->user()->id,
                'remarks' => $args['remarks']
            ]);

            return $project;
        }
    }

}

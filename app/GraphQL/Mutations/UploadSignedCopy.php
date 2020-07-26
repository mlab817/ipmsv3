<?php

namespace App\GraphQL\Mutations;

use App\Models\Project;
use App\Models\ProjectProcessingStatus;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UploadSignedCopy
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        // TODO implement the resolver
        // args contain id and signed_copy
        $project = Project::find($args['id']);

        if (!$project) {
            return null;
        }

        $signed_copy = $args['signed_copy'];
        $user = $context->user();

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
        $project->save();

        return $project;
    }
}

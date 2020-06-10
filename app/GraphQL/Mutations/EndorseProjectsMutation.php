<?php

namespace App\GraphQL\Mutations;

use App\Models\Endorsement;
use App\Models\Project;
use App\Notifications\ProjectEndorsed;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class EndorseProjectsMutation
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
        $endorsement = null;

        $projectsToEndorse = $args['projects'];
        $file = $args['file'];

        $uploadedFile = Storage::disk('dropbox')->put('endorsements', $file);
        $link = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient()->createSharedLinkWithSettings($uploadedFile);
        $url = $link['url'];
        $rawUrl = Str::replaceLast("dl=0","raw=1",$url);

        $endorsement = Endorsement::create([
            'uuid' => Str::uuid(),
            'file_name' => $file->getClientOriginalName(),
            'file_size' =>  $file->getSize(),
            'file_extension' => $file->getClientOriginalExtension(),
            'file_path' => $uploadedFile,
            'file_type' => $file->getMimeType(),
            'dropbox_link' => $rawUrl,
            'uploaded_by' => $context->user()->id
        ]);

        $projects = Project::whereIn('id',$projectsToEndorse)->get();

        foreach ($projects as $project) {
            $project->endorsement_id = $endorsement->id;
            $project->submission_status_id = 3; // set submission status to endorsed
            $project->save();
        }

        $endorsement->projects()->saveMany($projects);

        $data = [
          'from' => $context->user()->email,
          'title' => 'Projects Endorsed',
          'body' => $projects->count() . ' projects endorsed',
          'actionText' => 'Review',
          'actionURL' => '/projects/review'
        ];

        Notification::send($context->user(), new ProjectEndorsed($data));

        return $endorsement;
    }
}

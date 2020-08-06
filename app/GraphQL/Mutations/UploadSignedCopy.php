<?php

namespace App\GraphQL\Mutations;

use App\Models\ProcessingStatus;
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

        $processing_status = ProcessingStatus::where('name','finalized')->first();

        $user = $context->user();

        // $uploadedFile = $file->storePublicly('uploads');
        $uploadedFile = $this->uploadFile($args['signed_copy']);

        $project->processing_status_id = $processing_status->id;
        $project->processed_by = $user->id;
        $project->signed_copy = $uploadedFile;
        $project->save();

        ProjectProcessingStatus::create([
            'project_id' => $args['id'],
            'processing_status_id' => $processing_status->id,
            'processed_by' => $context->user()->id,
            'remarks' => $args['remarks']
        ]);

        return $project;
    }

    public function uploadFile($file)
    { 
        $now = \Carbon\Carbon::now();
        $timestamp = \Carbon\Carbon::parse($now)->timestamp;

        $uploadedFile = Storage::disk('google')->putFileAs('19tyR1DNSWdAQSkg9-yfaxheePpwDU8zA', $file, 'signed_copies' . $timestamp);

        return Storage::disk('google')->url($uploadedFile);
    }
}

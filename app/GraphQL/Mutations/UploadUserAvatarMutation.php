<?php

namespace App\GraphQL\Mutations;

use App\Models\Image;
use App\User;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UploadUserAvatarMutation
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
        $userId = $context->user->id;

        $file = $args['image'];

        $uploadedFile = Storage::disk('dropbox')->putFile('user_' . $userId.'/avatars', $file);

        $link = Storage::disk('dropbox')
          ->getDriver() // `\League\Flysystem\Flysystem` instance
          ->getAdapter() // `\Spatie\FlysystemDropbox\DropboxAdapter` instance
          ->getClient() // `\Spatie\Dropbox\Client` instance
          ->createSharedLinkWithSettings($uploadedFile);
        $url = $link['url'];
        $rawUrl = Str::replaceLast("dl=0","raw=1",$url);

        $image = Image::create([
            'name' => $file->getClientOriginalName(),
            'type' => 'avatars',
            'mime_type' => $file->getClientMimeType(),
            'extension' => $file->getClientOriginalExtension(),
            'size' => $file->getClientSize(),
            'dropbox_path' => $uploadedFile,
            'dropbox_link' => $rawUrl,
            'uploader_id' => $userId,
        ]);

        $user = $context->user();

        $user->image_id = $image->id;
        $user->save();

        return $user;
    }
}

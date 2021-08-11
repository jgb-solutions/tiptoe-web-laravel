<?php

namespace App\GraphQL\Queries;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UploadUrlQuery
{
  public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
  {
    extract($args);

    $wasabi = \Storage::disk('wasabi');
    $client = $wasabi->getDriver()->getAdapter()->getClient();
    $filePath = static::makeUploadFilePath($name);
    try {
     $options = [
      'Bucket' => config('filesystems.wasabi.bucket'),
      'Key' => static::makeUploadFilePath($name),
      'ACL' => 'public-read'
      ];

      $command = $client->getCommand('PutObject', $options);

      $request = $client->createPresignedRequest($command, "+10 minutes");

      $signed_url = (string) $request->getUri();

      return [
          'signedUrl' => $signed_url,
          'filename' => $filePath,
      ];
    } catch (\Exception $e) {
       return [
        'signedUrl' => $e,
        'filename' => $filePath,
    ];
    }

  }

  public static function makeUploadFolder()
  {
      $user = auth()->guard('api')->user();
      return 'user_' . $user->id . '/' . date('Y/m/d');
  }

  public static function makeUploadFileName($name)
  {
      return time() . '.' . pathinfo($name, PATHINFO_EXTENSION);
  }

  public static function makeUploadFilePath($name)
  {
      return static::makeUploadFolder() . '/' . static::makeUploadFileName($name);
  }
}

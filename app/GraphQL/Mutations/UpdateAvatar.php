<?php

namespace App\GraphQL\Mutations;

class UpdateAvatar
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        extract($args);
        $user = auth()->guard('api')->user();
        if ($user && $user->update(["avatar" => $avatar])) {
            return ["success" => true];
        }
        else {
            return ["success" => false];
        }
    }
}
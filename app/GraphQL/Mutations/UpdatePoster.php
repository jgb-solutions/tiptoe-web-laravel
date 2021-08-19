<?php

namespace App\GraphQL\Mutations;

class UpdatePoster
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
        if ($user && $user->modele->update(["poster" => $poster])) {
            return ["success" => true];
        }
        else {
            return ["success" => false];
        }
    }
}
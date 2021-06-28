<?php

namespace App\GraphQL\Mutations;
use App\Models\User;

class VerifyUserEmail
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        extract($args);
        
        $exist = !!User::where('email', $email)->first();
        
        return ['exist'=> $exist];
    }
}
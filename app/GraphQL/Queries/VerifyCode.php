<?php

namespace App\GraphQL\Queries;

use App\Models\PasswordReset;

class VerifyCode
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        extract($args);

        $success = !!PasswordReset::where([["email", $input['email']], ["token", $input['code']]])->first();

        return ["success" => $success];
    }
}
<?php

namespace App\GraphQL\Mutations;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\PasswordReset;

class ResetPassword
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        extract($args);
        $success = !!User::where("email", $email)->first()->update(["password"=> Hash::make($password)]);
        PasswordReset::where("email", $email)->delete();

        return ["success" => $success, "message" => "Your password has been changed successfully"];
    }
}
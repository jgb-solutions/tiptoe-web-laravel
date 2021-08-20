<?php

namespace App\GraphQL\Queries;
use App\Models\User;

use Mail;
use App\Mail\ResetPassword;
use App\Models\PasswordReset as Reset;

class VerifyEmail
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        extract($args);
        
        $user = User::where('email', $email)->first();
        $code = random_int(100000, 999999);

        Reset::create([
            "email" => $user->email,
            "token" => $code
        ]);
        
        Mail::to($user->email)->queue(new ResetPassword($code));


        return ["message" => 'Please enter the 6 digit code that you received in your email'];
    }
}
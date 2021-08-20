<?php

namespace App\GraphQL\Mutations;
use Illuminate\Support\Facades\Hash;

class ChangePassword
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        extract($args);

        $response = array();

        if(Hash::check($password, auth()->user()->password))
        {
            if (auth()->user()->update(["password" => Hash::make($new_password)])) {
                $response = ["success"=> true, "message"=> "Your password has been changed"];
            } else {
                $response = ["success"=> false, "message"=> "Your password was not changed"];
            }
        }
        else
        {
            $response = ["success"=> false, "message"=> "Incorrect password"];
        }

        return $response;
        // return ["response" => $response];
    }
}
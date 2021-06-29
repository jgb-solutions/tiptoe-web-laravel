<?php

namespace App\GraphQL\Mutations;
use App\Exceptions\CustomException;
use App\Models\User;

class Login
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $credentials = [
            'email' => $args['username'],
            'password' => $args['password'],
        ];

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = auth()->attempt($credentials)) {
                // throw new CustomException("The email or password is incorrect.", 401);
                throw new CustomException("The email or password is incorrect.", 401);
            }
        } catch (CustomException $e) {
            // something went wrong whilst attempting to encode the token
            throw new CustomException("The token could not be created.", 500);
        }

        // all good so return the token
        $user = auth()->user();
        $token = $user->createToken($user->name);

        // return response
        return [
            'user' => $user,
            'access_token' => $token->plainTextToken,
        ];
    }
}
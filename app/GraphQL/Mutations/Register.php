<?php

namespace App\GraphQL\Mutations;
use App\Exceptions\CustomException;
use App\Models\User;

class Register
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        \DB::beginTransaction();
        try {
            // try to create the user
            $user = User::create($args);
            
            // Everything is ok, create model for user if the type is a model
            if ($args['user_type'] === "MODEL" && $args['modele'] !== '') {
                $user->modele()->create($args['modele']['create']);
            }
        } catch (CustomException $e) {
            \DB::rollback();
            // something went wrong whilst attempting to encode the token
            throw new CustomException("The user could not be created.", 500);
        }
        \DB::commit();
        
        //log the user in 
        
        // create the token
        $token = $user->createToken($user->name);

        // return response
        return [
            "tokens" => ['user' => $user, 'access_token' => $token->plainTextToken],
            "status" => "SUCCESS"
        ];
    }
}
<?php

namespace App\GraphQL\Queries;

class CreatePaymentIntent
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        extract($args);
        $client_secret = "";

        $intents = auth()->user()->createSetupIntent();

        if($intents)
        {
            $client_secret = $intents->client_secret;
        }
        

        return ["client_secret" => $client_secret];
    }
}
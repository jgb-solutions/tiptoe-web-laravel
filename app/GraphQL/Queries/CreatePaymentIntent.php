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
        $data = ["client_secret" => auth()->user()->createSetupIntent()->client_secret];
        return $data;
    }
}
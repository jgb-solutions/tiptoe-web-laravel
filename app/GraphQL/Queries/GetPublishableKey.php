<?php

namespace App\GraphQL\Queries;

class GetPublishableKey
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return ['key' => env('STRIPE_KEY')];
    }
}
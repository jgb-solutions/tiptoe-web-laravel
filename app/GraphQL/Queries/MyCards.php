<?php

namespace App\GraphQL\Queries;

class MyCards
{
    /**
    * @param  null  $_
    * @param  array<string, mixed>  $args
    */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $cards = [];
        $paymentMethods = auth()->user()->paymentMethods();

        foreach ($paymentMethods as $card) { 
            array_push($cards,  
            [
                'id'=> $card->id, 
                "last4"=> $card->card->last4, 
                "brand"=> $card->card->brand, 
                "exp_month"=> $card->card->exp_month, 
                "exp_year"=> $card->card->exp_year
            ]);
        }

        return $cards;
    }
}
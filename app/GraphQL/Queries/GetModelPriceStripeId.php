<?php

namespace App\GraphQL\Queries;
use App\Models\Modele;

class GetModelPriceStripeId
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        extract($args);
        
        $price = [];

        if(isset($hash))
        {
            $modele = Modele::where('hash',$hash)->first();
            
            if($modele && $modele->user->modelPlan)
            {
                $price = [
                    "price_id" => $modele->user->modelPlan->stripe_plan,
                    "cost"     => $modele->user->modelPlan->cost
                ];
            }
        }

        return $price;
    }
}
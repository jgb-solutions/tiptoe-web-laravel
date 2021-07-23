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
        $modele = Modele::where('hash',$hash)->first();
        
        $price_id = '';
        
        if($modele && $modele->user->modelPlan)
        {
            $price_id = $modele->user->modelPlan->stripe_plan;
        }

        return ["price_id" => $price_id];
    }
}
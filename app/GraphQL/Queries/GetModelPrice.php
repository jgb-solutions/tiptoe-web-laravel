<?php

namespace App\GraphQL\Queries;
use App\Models\Modele;

class GetModelPrice
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
        
        $price = '';
        
        if($modele && $modele->user->modelPlan)
        {
            $price = $modele->user->modelPlan->stripe_plan;
        }

        return ["price" => $price];
    }
}
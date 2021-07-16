<?php

namespace App\GraphQL\Mutations;

use App\Models\ModelPlan as Plan;
use App\Models\User;
use Stripe;

class ModelPlan 
{
    protected $stripeId;

    public function __construct()
    {
        $this->stripeId = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    }
    
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        extract($args);
        $success = false;

        //create stripe product
        $stripeProduct = $this->stripe->products->create([
            'name' => $name,
        ]);
        
        //Stripe Plan Creation
        $stripe->prices->create([
            'unit_amount' => $cost * 100,
            'currency' => 'usd',
            'recurring' => ['interval' => 'month'],
            'product' => $stripeProduct->id,
          ]);

        $data['stripe_plan'] = $stripePlanCreation->id;

        $success = !!Plan::create([
            'name' => $name,
            'user_id' => $user_id,
            'stripe_plan' => $stripePlanCreation->id,
            'cost' => $cost
        ]);

        return ['success'=> $success];
    }
}
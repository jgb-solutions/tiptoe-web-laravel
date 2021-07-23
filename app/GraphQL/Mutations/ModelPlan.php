<?php

namespace App\GraphQL\Mutations;

use App\Models\ModelPlan as Plan;
use App\Models\User;
use \Stripe\Stripe;  

class ModelPlan 
{
    protected $stripeId;

    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $this->stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
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
        
        \DB::beginTransaction();
        try{
            //Stripe Plan Creation
            $stripePlanCreation = $this->stripe->prices->create([
                'unit_amount' => $cost * 100,
                'currency' => 'usd',
                'recurring' => ['interval' => 'month'],
                'product' => $stripeProduct->id,
            ]);

            $success = !!Plan::create([
                'name' => $name,
                'user_id' => $user_id,
                'stripe_plan' => $stripePlanCreation->id,
                'cost' => $cost
            ]);
        }catch(\Exception $e){
            \DB::rollback();
            \Log::info('The price cannot be create at this time', ['error' => $e] );
        }
        \DB::commit();
        
        return ['success'=> $success];
    }
}
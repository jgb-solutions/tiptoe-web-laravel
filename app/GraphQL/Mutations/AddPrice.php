<?php

namespace App\GraphQL\Mutations;

use App\Models\ModelPlan as Plan;
use App\Models\User;
use \Stripe\Stripe;

class AddPrice
{
    protected $stripeId;

    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $this->stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
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

        $product = $this->stripe->prices->retrieve( $stripePrice_id, [] );

                
        $price = ModelPlan::where('user_id', $user_id)->first();
        
        if($price->cost ==  $cost)
        {
            return "This price is alredy there";
        }
        else{
            \DB::beginTransaction();
            try{
                $stripePlanCreation = $this->stripe->prices->create([
                    'unit_amount' => $cost * 100,
                    'currency' => 'usd',
                    'recurring' => ['interval' => 'month'],
                    'product' => $product->product,
                ]);
                
                $success = !!$price->update([
                    'cost' => $cost,
                    'stripe_plan' => $stripePlanCreation->id,
                ]);
                
            }catch(\Exception $e){
                \DB::rollback();
                \Log::info('The price cannot be create at this time', ['error' => $e] );
            }
            \DB::commit();
        }
        
        return ['success'=> $success];
    }
}
<?php

namespace App\GraphQL\Mutations;

use App\Models\ModelPlan;
use App\Models\User;
use \Stripe\Stripe;

class AddPrice
{
    protected $stripe;

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
        $user = User::find($user_id);
        $price = ModelPlan::where('user_id', $user_id)->first();
        
        if($price)
        {
            $product = $this->stripe->prices->retrieve( $price->stripe_plan, [] );
            
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
        }
        else
        {
             //create stripe product
            $stripeProduct = $this->stripe->products->create([
                'name' => $user->modele->stage_name,
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

                $success = !!ModelPlan::create([
                    'name' => $user->modele->stage_name,
                    'user_id' => $user_id,
                    'stripe_plan' => $stripePlanCreation->id,
                    'cost' => $cost
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
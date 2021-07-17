<?php

namespace App\GraphQL\Mutations;

use App\Models\Follower;
use App\Models\Favorite;
use \Stripe\Stripe;

class ToggleFollow
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
        
        $user = auth()->user();
        $success = false;

        $modeles = $user->modeles->where('id', $modele_id)->first();
        
        if ($modeles) {
            \DB::beginTransaction();
            try{
                $this->stripe->subscriptions->cancel(
                    $subscription_id,
                    []
                );
                  
                $success = !!Follower::where([['user_id', $user->id], ['modele_id', $modele_id]])->first()->delete();
            }catch(\Exception $e){
                \DB::rollback();
                \Log::info('The subscription cannot be canceled at this time', ['error' => $e] );
            }
            \DB::commit();
        } else {

            \DB::beginTransaction();
            try{
                $user->createOrGetStripeCustomer();
                $user->updateDefaultPaymentMethod($payment_method);
                            
                $this->stripe->subscriptions->create([
                    'customer' => $user->stripe_id,
                    'items' => [
                    ['price' => $stripe_price],
                    ],
                ]);
                
                $success = !!Follower::create([
                    'user_id'  => $user->id,
                    'modele_id' => $modele_id
                ]);
                
            }catch(\Exception $e){
                \DB::rollback();
                \Log::info('The subscription cannot be created at this time', ['error' => $e] );
            }
            \DB::commit();
        }
        
        return ['success'=> $success];
        
    }
}
<?php

namespace App\GraphQL\Mutations;

use \Stripe\Stripe;

class SetDefaultCard
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
        $user = auth()->user();
        $paymentMethod = $this->stripe->paymentMethods->retrieve($card, [] );

        \DB::beginTransaction();
        try{
            $user->updateDefaultPaymentMethod($paymentMethod);
        }catch(\Exception $e){
            \DB::rollback();
            \Log::info('We cannot change your default card at this time. Try agian', ['error' => $e] );
        }
        \DB::commit();
        
        return ['success'=> $success];
    }
}
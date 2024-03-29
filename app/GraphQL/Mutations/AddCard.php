<?php

namespace App\GraphQL\Mutations;

class AddCard
{
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
        $user->createOrGetStripeCustomer();
        
        \DB::beginTransaction(); 
        try{
            $success = !!$user->addPaymentMethod($card);
            $user->updateDefaultPaymentMethodFromStripe();
        }catch(\Exception $e){
            \DB::rollback();
            \Log::info('We cannot add your card at this time. Try agian', ['error' => $e] );
        }
        \DB::commit();
        
        return ['success'=> $success];
    }
}
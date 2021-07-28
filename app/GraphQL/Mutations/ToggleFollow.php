<?php

namespace App\GraphQL\Mutations;

use App\Models\Follower;
use App\Models\Favorite;
use App\Models\Modele;
use \Stripe\Stripe;

class ToggleFollow
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
        
        $user = auth()->user();
        $success = false;

        $modele = $user->modeles->where('id', $modele_id)->first();
        
        if ($modele) {
            \DB::beginTransaction();
            try{
                $user->subscription($modele->stage_name)->cancel();
                  
                $success = !!Follower::where([['user_id', $user->id], ['modele_id', $modele_id]])->first()->delete();
            }catch(\Exception $e){
                \DB::rollback();
                \Log::info('The subscription cannot be canceled at this time', ['error' => $e] );
            }
            \DB::commit();
        } else {

            \DB::beginTransaction();
            try{
                $modele = Modele::find($modele_id);
                
                $user->createOrGetStripeCustomer();
                $user->updateDefaultPaymentMethod($payment_method);

                $user->newSubscription($modele->stage_name, $modele->user->modelPlan->stripe_plan)->create($payment_method, []);
                
                $modele->modeleTransactions()->create([
                    "amount" => $modele->user->modelPlan->cost
                ]);

                $modele->modeleAccount->update([
                    "account" => $modele->user->modelPlan->cost + $modele->modeleAccount->account,
                    "balance" => $modele->user->modelPlan->cost + $modele->modeleAccount->balance
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
<?php

namespace App\GraphQL\Queries;
use \Stripe\Stripe;

class DeleteInvoice
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

        $success = !! $this->stripe->invoiceItems->delete( $invoiceId , [] );

        return ['success'=> $success];
    }
}
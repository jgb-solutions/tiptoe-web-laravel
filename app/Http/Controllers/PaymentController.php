<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Stripe\Stripe;

class PaymentController extends Controller
{
    protected $stripe;

    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $this->stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
        
    }

    public function createExpressAccount()
    {
        return $account = \Stripe\Account::create([
            'country' => 'US',
            'type' => 'express',
        ]);

    }
}
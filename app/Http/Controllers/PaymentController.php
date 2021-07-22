<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Stripe\Stripe;

class PaymentController extends Controller
{
    protected $stripe;

    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $this->stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        
    }

    public function createExpressAccount()
    {
        return $account = \Stripe\Account::create([
            'country' => 'US',
            'type' => 'express',
        ]);

    }
}
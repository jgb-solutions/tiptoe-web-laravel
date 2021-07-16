<?php

namespace App\Http\Controllers;

use App\Models\ModelPlan;
use Illuminate\Http\Request;
use Stripe;

class ModelPlanController extends Controller
{
    protected $stripeId;

    public function __construct()
    {
        $this->stripeId = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $data['slug'] = strtolower($data['name']);

        //create stripe product
        $stripeProduct = $this->stripe->products->create([
            'name' => $data['name'],
        ]);
        
        //Stripe Plan Creation
        $stripe->prices->create([
            'unit_amount' => $data['cost'] * 100,
            'currency' => 'usd',
            'recurring' => ['interval' => 'month'],
            'product' => $stripeProduct->id,
          ]);

        $data['stripe_plan'] = $stripePlanCreation->id;

        Plan::create($data);

        echo 'plan has been created';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ModelPlan  $modelPlan
     * @return \Illuminate\Http\Response
     */
    public function show(ModelPlan $modelPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModelPlan  $modelPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelPlan $modelPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModelPlan  $modelPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelPlan $modelPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModelPlan  $modelPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelPlan $modelPlan)
    {
        //
    }
}
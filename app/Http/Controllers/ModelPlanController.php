<?php

namespace App\Http\Controllers;

use App\Models\ModelPlan;
use Illuminate\Http\Request;
use \Stripe\Stripe;

class ModelPlanController extends Controller
{
    protected $stripe;

    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $this->stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        
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

        // $data['name'] = "Grace";
        // $data['cost'] = 100;
        // $data['user_id'] = 4;

        //create stripe product
        $stripeProduct = $this->stripe->products->create([
            'name' => $data['name'],
        ]);
    
        \DB::beginTransaction();
        try{
            //Stripe Plan Creation
            $stripePlanCreation = $this->stripe->prices->create([
                'unit_amount' => $data['cost'] * 100,
                'currency' => 'usd',
                'recurring' => ['interval' => 'month'],
                'product' => $stripeProduct->id,
            ]);

            ModelPlan::create([
                'name' => $data['name'],
                'user_id' => $data['user_id'],
                'stripe_plan' => $stripePlanCreation->id,
                'cost' => $data['cost']
            ]); 
        }catch(\Exception $e){
            \DB::rollback();
            \Log::info('The price cannot be create at this time', ['error' => $e] );
            return back()->with('warning','The price cannot be create at this time');
        }
        \DB::commit();

        echo 'plan has been created';
    }

    
    
    public function AddPrice(Request $request)
    {
        $data = $request->except('_token');

        return $modeles = auth()->user()->modeles->where('id', 1)->first();
        
        
        $product = $this->stripe->prices->retrieve( $data['stripePrice_id'], [] );
        
        $price = ModelPlan::where('user_id', $data['user_id'])->first();
        
        if($price->cost ==  $data['cost'])
        {
            return "This price is alredy there";
        }
        else{
            \DB::beginTransaction();
            try{
                $stripePlanCreation = $this->stripe->prices->create([
                    'unit_amount' => $data['cost'] * 100,
                    'currency' => 'usd',
                    'recurring' => ['interval' => 'month'],
                    'product' => $product->product,
                ]);
                
                $price->update([
                    'cost' => $data['cost'],
                    'stripe_plan' => $stripePlanCreation->id,
                ]);
                
            }catch(\Exception $e){
                \DB::rollback();
                \Log::info('The price cannot be create at this time', ['error' => $e] );
                return back()->with('warning','The price cannot be create at this time');
            }
            \DB::commit();
        }

        echo 'The plan has been changed';
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
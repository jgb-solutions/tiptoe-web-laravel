<?php

namespace App\GraphQL\Queries;

class MyInvoices
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $invoices = [];
        $myInvoices = auth()->user()->invoices();;

        foreach ($myInvoices as $invoice) { 
            array_push($invoices,  
            [
                'id'=> $invoice->id, 
                "amount_paid"=> $invoice->amount_paid / 100, 
                "created"=> date('d M Y',$invoice->created), 
                "hosted_invoice_url" => $invoice->hosted_invoice_url,
                "lines" => $invoice->lines->data[0]->id
            ]);
        }

        return $invoices;
    }
}
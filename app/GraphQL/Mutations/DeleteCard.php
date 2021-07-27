<?php

namespace App\GraphQL\Mutations;
 
class DeleteCard
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

        \DB::beginTransaction();
        try{
            $success = !!$user->findPaymentMethod($card)->delete();
        }catch(\Exception $e){
            \DB::rollback();
            \Log::info('We cannot delete your card at this time. Try agian', ['error' => $e] );
        }
        \DB::commit();
        
        return ['success'=> $success];
    }
}
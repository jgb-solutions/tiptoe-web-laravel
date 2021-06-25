<?php

namespace App\GraphQL\Mutations;

use App\Models\Follower;
use App\Models\Favorite;

class ToggleFollow
{
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

        $modeles = $user->modeles->where('id', $modele_id);
        
        if ($modeles->count() > 0 ) {
            $success = !!Follower::where([['user_id', $user->id], ['modele_id', $modele_id]])->first()->delete();
        } else {
            $success = !!Follower::create([
                'user_id'  => $user->id,
                'modele_id' => $modele_id
            ]);
        }
        
        return ['success'=> $success];
        
    }
}
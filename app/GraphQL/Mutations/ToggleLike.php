<?php

namespace App\GraphQL\Mutations;

use App\Models\Favorite;

class ToggleLike
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

        $favorite = $user->favorites->where('id', $photo_id);
        
        if ($favorite->count() > 0 ) {
            $success = !!Favorite::where([['user_id', $user->id], ['photo_id', $photo_id]])->first()->delete();
        } else {
            $success = !!Favorite::create([
                'user_id'  => $user->id,
                'photo_id' => $photo_id
            ]);
        }
        
        return ['success'=> $success];
    }
}
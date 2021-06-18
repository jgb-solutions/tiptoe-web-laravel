<?php

namespace App\GraphQL\Queries;

use Illuminate\Pagination\Paginator;
use Auth;

use App\Models\User;

class FavoritePhoto
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        extract($args);

        $user = User::find($user_id);
        return  $user->favorites()->paginate($first || 20);

        // return User::find($user_id)->favorites;

    }

    
}
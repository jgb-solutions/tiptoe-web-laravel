<?php

namespace App\GraphQL\Mutations;
use App\Models\Modele;

class DeleteModel
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        extract($args);

        $model = Modele::findOrFail($id);
        
        $success = !!$model->delete();
        $user = $model->user->update(["user_type"=> "CONSUMER"]);
        $success = !!($model && $user);
        

        return [
            'user' => $model->user,
            'success' => $success,
        ];
    }
}
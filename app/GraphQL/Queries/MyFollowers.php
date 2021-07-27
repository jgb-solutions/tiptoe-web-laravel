<?php

namespace App\GraphQL\Queries;

class MyFollowers
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $modele = auth()->user()->modele;
        if ($modele) {
           return $modele->followers;
        }
        return;
    }
}
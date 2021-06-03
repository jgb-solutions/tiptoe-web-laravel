<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            "name" =>  "Jean Gérard",
            "email" => "jgbneatdesign@gmail.com",
            "email_verified_at" => now(),
            "password" => Hash::make('23jim0488'),
            "admin" =>  true,
            "telephone" =>  "41830318",
            "user_type" =>  "consumer",
            "gender" =>  "male",
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('users')->insert([
            "name" =>  "Gregory Gaudin",
            "email" => "greg@tiptoe.com",
            "email_verified_at" => now(),
            "password" => Hash::make('23jim0488'),
            "admin" =>  true,
            "telephone" =>  "+19415650253",
            "user_type" =>  "consumer",
            "gender" =>  "male",
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('users')->insert([
            "name" =>  "Poliard Djimmy",
            "email" => "poliarddjimmy@gmail.com",
            "email_verified_at" => now(),
            "password" => Hash::make('23jim0488'),
            "admin" =>  false,
            "telephone" =>  "+18492107910",
            "user_type" =>  "model",
            "gender" =>  "male",
            
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
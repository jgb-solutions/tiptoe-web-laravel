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
            "password" => Hash::make('password'),
            "admin" =>  true,
            "telephone" =>  "41830318",
            "user_type" =>  "CONSUMER",
            "gender" =>  "MALE",
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('users')->insert([
            "name" =>  "Gregory Gaudin",
            "email" => "greg@tiptoe.com",
            "email_verified_at" => now(),
            "password" => Hash::make('password'),
            "admin" =>  true,
            "telephone" =>  "+19415650253",
            "user_type" =>  "CONSUMER",
            "gender" =>  "MALE",
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('users')->insert([
            "name" =>  "Djimmy Poliard",
            "email" => "poliarddjimmy@gmail.com",
            "email_verified_at" => now(),
            "password" => Hash::make('password'),
            "avatar" => "https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500",
            "admin" =>  false,
            "telephone" =>  "+18492107910",
            "user_type" =>  "CONSUMER",
            "gender" =>  "MALE",
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('users')->insert([
            "name" =>  "Amelia Jean",
            "email" => "amelia@tiptoe.app",
            "email_verified_at" => now(),
            "password" => Hash::make('password'),
            "avatar" => "https://www.wallpaperbetter.com/wallpaper/54/714/544/women-model-portrait-face-georgiy-chernyadyev-brunette-beauty-1080P-wallpaper-middle-size.jpg",
            "admin" =>  false,
            "telephone" =>  "+18496157915",
            "user_type" =>  "MODEL",
            "gender" =>  "FEMALE",
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('users')->insert([
            "name" =>  "Carline Doe",
            "email" => "carline@tiptoe.app",
            "email_verified_at" => now(),
            "password" => Hash::make('password'),
            "avatar" => "https://www.face-agency.co.uk/images/uploads/models/large/1548678753-21.jpg",
            "admin" =>  false,
            "telephone" =>  "+18429157618",
            "user_type" =>  "MODEL",
            "gender" =>  "FEMALE",
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('users')->insert([
            "name" =>  "Test User",
            "email" => "test@test.app",
            "email_verified_at" => now(),
            "password" => Hash::make('password'),
            "avatar" => "https://www.face-agency.co.uk/images/uploads/models/large/1548678753-21.jpg",
            "admin" =>  false,
            "telephone" =>  "+18429157618",
            "user_type" =>  "MODEL",
            "gender" =>  "FEMALE",
            
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
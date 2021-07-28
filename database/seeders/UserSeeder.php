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
            "gender" =>  "male",
            
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
            "gender" =>  "male",
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('users')->insert([
            "name" =>  "Djimmy Poliard",
            "email" => "poliarddjimmy@gmail.com",
            "email_verified_at" => now(),
            "password" => Hash::make('password'),
            "avatar" => "https://scontent.fhex4-1.fna.fbcdn.net/v/t1.6435-9/67911518_2620692784648944_4849506694138429440_n.jpg?_nc_cat=101&ccb=1-3&_nc_sid=09cbfe&_nc_eui2=AeGQKHC3cAGmt6k2uIDmMKb-JIAyxHlhzsQkgDLEeWHOxL9CgesW_pcBO7SChkMAayzb46bTtLeIYan6as3eQOvC&_nc_ohc=bcVgCtrpYSAAX8YRTgF&_nc_ht=scontent.fhex4-1.fna&oh=fc6df41de81dd2de21d4d1eff6e9dfa4&oe=60D829FE",
            "admin" =>  false,
            "telephone" =>  "+18492107910",
            "user_type" =>  "CONSUMER",
            "gender" =>  "male",
            
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
            "gender" =>  "female",
            
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
            "gender" =>  "female",
            
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
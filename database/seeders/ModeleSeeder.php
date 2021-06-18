<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ModeleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('modeles')->insert([
            'user_id'    => '3',
            'stage_name' => 'Jey13',
            'hash'        => 3,
            'bio'        => 'cool',
            'facebook'   => 'jey13',
            'instagram'  => 'jey13',
            'twitter'    => 'jey13',
            'youtube'    => 'jey13',
            'verified'   => true,
            
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
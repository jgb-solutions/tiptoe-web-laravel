<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ModeleAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('modele_accounts')->insert([
            'modele_id'    => '1',
            'account' => '0', 
            'balance' => '0',
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('modele_accounts')->insert([
            'modele_id'    => '2',
            'account' => '0', 
            'balance' => '0',
            
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
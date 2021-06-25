<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert([
            'name' => 'Foot nail',
            'slug' => '796fb9f7-760b-44f6-ah46-06d337cb8f4g',
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('categories')->insert([
            'name' => 'Hand nail',
            'slug' => '796fb9f7-760b-64f6-ah46-06d337cb8f4h',
            
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
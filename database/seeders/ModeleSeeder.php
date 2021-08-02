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
            'user_id'    => '4',
            'stage_name' => 'Ameli',
            'poster'     => 'https://wallpapercave.com/wp/wp7105804.jpg',
            'bio'        => 'I\'m a cool girl',
            'hash'       => '796fb9s7-780f-44j6-ay46-06d337tb8f4g',
            'facebook'   => 'amelia',
            'instagram'  => '@amelia-jean',
            'twitter'    => '@amelia-jean',
            'youtube'    => 'Amelia Jean',
            'verified'   => true,
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('modeles')->insert([
            'user_id'    => '5',
            'stage_name' => 'Carlina',
            'poster'     => 'http://anglictina.limic.com/wp-content/uploads/2019/12/102.jpg',
            'bio'        => 'I\'m a bad girl',
            'hash'       => '796fb9s7-780f-44j6-ay46-05g324tb8f4g',
            'facebook'   => 'carlina',
            'instagram'  => '@carlina-doe',
            'twitter'    => '@carlina-doe',
            'youtube'    => 'Carline Doe',
            'verified'   => true,
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('modeles')->insert([
            'user_id'    => '6',
            'stage_name' => 'Test',
            'poster'     => 'http://anglictina.limic.com/wp-content/uploads/2019/12/102.jpg',
            'bio'        => 'I\'m a bad girl',
            'hash'       => '796fb9s7-780f-44j6-ay46-05d337tb8f4g',
            'facebook'   => 'test',
            'instagram'  => '@test',
            'twitter'    => '@test',
            'youtube'    => 'Test User',
            'verified'   => true,
            
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
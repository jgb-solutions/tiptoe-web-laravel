<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('photos')->insert([
            "modele_id"   =>  "1",
            'category_id' => "1",
            'type'        => "photo",
            'uri'         => "https://i1.wp.com/forcreativejuice.com/wp-content/uploads/2016/05/toe-nail-art-ideas/1-toe-nail-art-ideas.jpg?w=600&ssl=1",
            'bucket'      => "https://i1.wp.com/forcreativejuice.com/wp-content/uploads/2016/05/toe-nail-art-ideas/1-toe-nail-art-ideas.jpg?w=600&ssl=1",
            'caption'     => "Top model",
            'hash'       => '796fb5s7-780f-45j6-ay46-06d337tb8fg5g',
            'detail'      => "This is an example",
            'featured'    => true ,
            'publish'     => true ,
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('photos')->insert([
            "modele_id"   =>  "1",
            'category_id' => "1",
            'type'        => "photo",
            'uri'         => "https://data.whicdn.com/images/68747163/original.jpg",
            'bucket'      => "https://data.whicdn.com/images/68747163/original.jpg",
            'caption'     => "Top model",
            'hash'       => '796fb7s7-780f-43j6-ay56-06d337tb3f4g',
            'detail'      => "This is an example",
            'featured'    => true ,
            'publish'     => true ,
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('photos')->insert([
            "modele_id"   =>  "2",
            'category_id' => "1",
            'type'        => "photo",
            'uri'         => "https://static1a.thecuddl.com/images/2018/03/01-pretty-toe-nail-art-design-thecuddl.jpg.webp",
            'bucket'      => "https://static1a.thecuddl.com/images/2018/03/01-pretty-toe-nail-art-design-thecuddl.jpg.webp",
            'caption'     => "Top model",
            'hash'       => '796fb9s4-780f-54j6-ay96-06d337tb8f8g',
            'detail'      => "This is an example",
            'featured'    => true ,
            'publish'     => true ,
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('photos')->insert([
            "modele_id"   =>  "1",
            'category_id' => "1",
            'type'        => "photo",
            'uri'         => "https://img.webmd.com/dtmcms/live/webmd/consumer_assets/site_images/articles/health_tools/pedicure_slideshow/getty_rf_photo_of_fingers_and_toes.jpg",
            'bucket'      => "https://img.webmd.com/dtmcms/live/webmd/consumer_assets/site_images/articles/health_tools/pedicure_slideshow/getty_rf_photo_of_fingers_and_toes.jpg",
            'caption'     => "Top model",
            'hash'       => '796fb4s7-786f-44h6-an46-06d337tb8f4k',
            'detail'      => "This is an example",
            'featured'    => true ,
            'publish'     => true ,
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('photos')->insert([
            "modele_id"   =>  "2",
            'category_id' => "1",
            'type'        => "photo",
            'uri'         => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIeJIGnKn6TkoTV7t_Kb9deJNAIRfRK-mj3A&usqp=CAU",
            'bucket'      => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIeJIGnKn6TkoTV7t_Kb9deJNAIRfRK-mj3A&usqp=CAU",
            'caption'     => "Top model",
            'hash'       => '796eb9s7-785f-44d6-at46-06d337tb8f4f',
            'detail'      => "This is an example",
            'featured'    => true ,
            'publish'     => true ,
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('photos')->insert([
            "modele_id"   =>  "1",
            'category_id' => "1",
            'type'        => "photo",
            'uri'         => "https://static1a.thecuddl.com/images/2018/03/03-cute-toe-nail-art-design-thecudd.jpg.webp",
            'bucket'      => "https://static1a.thecuddl.com/images/2018/03/03-cute-toe-nail-art-design-thecudd.jpg.webp",
            'caption'     => "Top model",
            'hash'       => '796fb8s7-780f-44j6-ay66-06d335tb8f4g',
            'detail'      => "This is an example",
            'featured'    => true ,
            'publish'     => true ,
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('photos')->insert([
            "modele_id"   =>  "2",
            'category_id' => "1",
            'type'        => "photo",
            'uri'         => "https://i.ytimg.com/vi/GfMh3tUVCbQ/maxresdefault.jpg",
            'bucket'      => "https://i.ytimg.com/vi/GfMh3tUVCbQ/maxresdefault.jpg",
            'caption'     => "Top model",
            'hash'       => '796fr9s7-770f-44j6-ay56-06d337tb8f2g',
            'detail'      => "This is an example",
            'featured'    => true ,
            'publish'     => true ,
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('photos')->insert([
            "modele_id"   =>  "1",
            'category_id' => "1",
            'type'        => "photo",
            'uri'         => "https://static1a.thecuddl.com/images/2018/03/04-nice-toe-nail-art-design-thecudd.jpg.webp",
            'bucket'      => "https://static1a.thecuddl.com/images/2018/03/04-nice-toe-nail-art-design-thecudd.jpg.webp",
            'caption'     => "Top model",
            'hash'       => '796fb9s7-787f-44j6-at46-06d347tb8f4g',
            'detail'      => "This is an example",
            'featured'    => true ,
            'publish'     => true ,
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('photos')->insert([
            "modele_id"   =>  "1",
            'category_id' => "1",
            'type'        => "photo",
            'uri'         => "https://i.pinimg.com/originals/4d/ed/c5/4dedc58562ab2531c067fd234f4ed5e0.jpg",
            'bucket'      => "https://i.pinimg.com/originals/4d/ed/c5/4dedc58562ab2531c067fd234f4ed5e0.jpg",
            'caption'     => "Top model",
            'hash'       => '795fb9s7-780f-42j6-ay46-06d357tb8f4g',
            'detail'      => "This is an example",
            'featured'    => true ,
            'publish'     => true ,
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('photos')->insert([
            "modele_id"   =>  "2",
            'category_id' => "1",
            'type'        => "photo",
            'uri'         => "https://lh3.googleusercontent.com/proxy/NKzYQRnp0JuzTQmpKrlYAjTZq62fdidt4EKN8emlgXF4RD6AFPRzsnLecxY7k69VjOsssWJZ_P2lcVJsKnwPhaXZoUubnrJU46vWKmBbKUOAerZkKK6P8zhLgchDQjSpXTNV9fXoLVFgroPYtA",
            'bucket'      => "https://lh3.googleusercontent.com/proxy/NKzYQRnp0JuzTQmpKrlYAjTZq62fdidt4EKN8emlgXF4RD6AFPRzsnLecxY7k69VjOsssWJZ_P2lcVJsKnwPhaXZoUubnrJU46vWKmBbKUOAerZkKK6P8zhLgchDQjSpXTNV9fXoLVFgroPYtA",
            'caption'     => "Top model",
            'hash'       => '795fb9s7-780f-48j6-ay46-06d337tb9f4g',
            'detail'      => "This is an example",
            'featured'    => true ,
            'publish'     => true ,
            
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \DB::table('photos')->insert([
            "modele_id"   =>  "1",
            'category_id' => "1",
            'type'        => "photo",
            'uri'         => "https://www.foot.com/wp-content/uploads/2018/01/pretty.feet_.foot_.com_.png",
            'bucket'      => "https://www.foot.com/wp-content/uploads/2018/01/pretty.feet_.foot_.com_.png",
            'caption'     => "Top model",
            'hash'       => '795fb9s7-780f-54j6-ay48-06d337tb8f7g',
            'detail'      => "This is an example",
            'featured'    => true ,
            'publish'     => true ,
            
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
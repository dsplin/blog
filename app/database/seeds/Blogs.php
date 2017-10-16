<?php

class Blogs extends Seeder {

    public function run()
    {
        DB::table('blogs')->delete();

        $faker = Faker\Factory::create();
        $create=function() use ($faker)
        {
            $b = new Blog;
            $b-> title=$faker->sentence(mt_rand(1,5));
            $b-> content=$faker->paragraph(mt_rand(4,10));
            $b-> user_id=User::first()->id;
            $b->login=User::first()->login;
            $b-> save();
        };

        for ($i=0; $i<10; $i++) {
            $create();
        }
    }

}

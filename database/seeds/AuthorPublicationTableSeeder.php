<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class AuthorPublicationTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $author_list = App\Author::all();

        foreach ($author_list as $author) {
            //$save=0;
            $a = array_fill(0, $save = $faker->randomDigitNotNull($min = 1, $max = 10), 0);
            for ($i = 0; $i < $save; $i++) {
                $a[$i] = $faker->randomDigitNotNull($min = 1, $max = 50);
            }
            $author->publications()->attach($a);
        }
    }
}

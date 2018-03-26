<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class UserPublicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $publication_list = App\Publication::all();

        foreach ($publication_list as $pub) {
            //$save=0;
            $a = array_fill(0, $save = $faker->randomDigitNotNull($min = 1, $max = 10), 0);
            for ($i = 0; $i < $save; $i++) {
                $a[$i] = $faker->randomDigitNotNull($min = 1, $max = 50);
            }
            $pub->users()->attach($a);
        }
    }
}


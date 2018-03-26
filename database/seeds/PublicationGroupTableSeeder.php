<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class PublicationGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $group_list = App\Group::all();

        foreach ($group_list as $group) {

            $number_of_publications = $faker->randomDigitNotNull($min = 1, $max = 50);
            $pub = array_fill(0,$number_of_publications,0);

            for ($i = 0; $i < $number_of_publications; $i++) {

                $pub[$i] = $faker->randomDigitNotNull($min = 1, $max = 50);
            }

            $pub = array_unique($pub);

            for ($i = 0; $i < count($pub); $i++) {

                $pg = new App\PublicationGroup();
                $pg->publication_id = $pub[$i];
                $pg->group_id = $group->id;
                $pg->user_id = $faker->randomDigitNotNull($min = 1, $max = 50);
                $pg->created_at = $faker->dateTime($max = 'now', $timezone = null);
                $pg->updated_at = $faker->dateTime($max = 'now', $timezone = null);
                $pg->save();
            }

        }

    }
}

<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ConferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $faker = Faker::create();

            $list = App\Publication::where('type','conference')->get();

            foreach ($list as $l){
                $element = new App\Conference();

                $element->publication_id = $l->id;
                $element->abstract = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
                $element->pages = $faker->numberBetween($min = 0, $max = 500).'-'.$faker->numberBetween($min = 0, $max = 500);
                $element->days = $faker->date($format = 'Y-m-d', $max = 'now').'/'.$faker->date($format = 'Y-m-d', $max = 'now');

                $element->key = $faker->slug;
                $element-> doi = $faker->slug;
                $element->ee = $faker->slug;
                $element->url = $faker->url;

                $element->save();

            }
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class JournalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();

        $list = App\Publication::where('type','journal')->get();

        foreach ($list as $l){
            $element = new App\Journal();

            $element->publication_id = $l->id;
            $element->abstract = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
    	    $element->volume = $faker->sentence($nbWords = 6, $variableNbWords = true);
    	    $element->number = $faker->randomDigitNotNull;
    	    $element->pages = $faker->numberBetween($min = 0, $max = 500).'-'.$faker->numberBetween($min = 0, $max = 500);

            $element->key = $faker->slug;
            $element-> doi = $faker->slug;
            $element->ee = $faker->slug;
            $element->url = $faker->url;

            $element->save();

        }
    }
}

<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class UserTopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $topic_list = App\Topic::all();

        foreach ($topic_list as $top) {
            //$save=0;
            $a =array_fill(0, $save=$faker->randomDigitNotNull($min=1, $max=10), 0);
            for($i=0; $i<$save; $i++){
                $a[$i]=$faker->randomDigitNotNull($min=1, $max=20);
            }
            $top->users()->attach($a);
        }

    }
}

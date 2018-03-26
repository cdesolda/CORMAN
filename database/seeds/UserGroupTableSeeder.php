<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class UserGroupTableSeeder extends Seeder
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

        foreach ($group_list as $gro) {
            $save=$faker->randomDigitNotNull($min=1, $max=10);
            $a =array_fill(0, $save, 0);
            //$b =array_fill(0, $save,0);
            $b='';
            for($i=0; $i<$save; $i++){
                $a[$i] = $faker->randomDigitNotNull($min=1, $max=50);
                //$b[$save] = $faker->randomElement($array = array ('admin','member'));
                $b=$faker->randomElement($array = array ('admin','member'));

            }

            $gro->users()->attach($a, ['role' => $b,'created_at'=>$faker->dateTime($max = 'now', $timezone = null),'updated_at'=>$faker->dateTime($max = 'now', $timezone = null)]);
        }

    }
}

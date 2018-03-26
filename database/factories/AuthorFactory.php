<?php

use Faker\Generator as Faker;

$factory->define(App\Author::class, function (Faker $faker) {
    return [

        'name' => $faker->firstName($gender = 'male'|'female') . " " . $faker->lastName,
        //'user_id' => $faker->unique()->numberBetween($min = 1, $max = 50)

    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\Publication::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->catchPhrase.','.' '.$faker->bs,
        'type' => $faker->randomElement($array = array ('journal','conference','editorship')),
        'venue' => $faker->streetAddress.','.' '.$faker->country,
        'year' => $faker->dateTime($max = 'now', $timezone = null),
        'multimedia_path' => "https://picsum.photos/200/300/?random",
        'public' => $faker->numberBetween($min = 0, $max = 1),
        'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = null)
    ];
});

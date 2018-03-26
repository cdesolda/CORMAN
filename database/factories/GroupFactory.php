<?php

use Faker\Generator as Faker;

$factory->define(App\Group::class, function (Faker $faker) {
    return [
        'name'=> $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
        'subscribers_count' => $faker->numberBetween($min = 1, $max = 500),
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'picture_path' => "https://picsum.photos/200/300/?random",
        'public' => $faker->randomElement($array = array ('public','private'))
    ];
});

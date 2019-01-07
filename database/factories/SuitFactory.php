<?php

use Faker\Generator as Faker;

$factory->define(App\Suit::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence
    ];
});

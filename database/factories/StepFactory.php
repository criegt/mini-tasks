<?php

use Faker\Generator as Faker;

$factory->define(App\Step::class, function (Faker $faker) {
    return [
        'content' => $faker->sentence,
        'state' =>  false,
        'task_id' => rand(1, 50)
    ];
});

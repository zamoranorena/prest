<?php

use Faker\Generator as Faker;

$factory->define(\App\Position::class, function (Faker $faker) {
    return [
        'token' => str_random(30),
        'name' => $faker->name,
    ];
});

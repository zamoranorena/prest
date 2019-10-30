<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'token' => str_random(30),
        'name' => $faker->company,
    ];
});

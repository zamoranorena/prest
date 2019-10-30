<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'token' => str_random(30),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'nick_name' =>$faker->userName,
        'phone' =>$faker->numberBetween($min = 000000000, $max = 999999999),
        'company_id' => function () {
            return factory(App\Company::class)->create()->id;
        },
        'position_id' => function () {
            return factory(App\Position::class)->create()->id;
        },
        'address' => $faker->address,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});

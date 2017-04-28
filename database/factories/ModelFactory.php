<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('secret'),
        'role_id' => 2,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Lab::class, function (Faker\Generator $faker) {
    return [
        'cpu_name' => $faker->sentence(5),
        'comment' => $faker->text(),
        'mac' => $faker->macAddress(),
        'ip' => $faker->ipv4(),
    ];
});



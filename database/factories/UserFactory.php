<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'fName' => $faker->name,
        'sName' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => '07'.random_int(10000000,99999999),
        'username' => 'user'.random_int(0,9),
        'role' => 'student',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Meal::class, function (Faker $faker) {
    return [
        'image' => 'dish.png',
        'name' => 'Dish '.random_int(1,99),
        'price' => random_int(10,999),
        'qty' => random_int(10,99),
    ];
});

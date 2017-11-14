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

$factory->define(App\Models\User::class, function (Faker $faker) {
    static $password;
    
    return [
        'username' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'name' => $faker->name,
        'gender' => $faker->randomElement(['M' ,'F']),
        'password' => $password ?: $password = bcrypt('123456'),
        'profile_picture' => 'user/elliot.jpg',
        'remember_token' => str_random(10),
    ];
});
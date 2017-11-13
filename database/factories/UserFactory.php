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

    $filepath = storage_path('avatars');

    if(!File::exists($filepath)){
        File::makeDirectory($filepath);
    }

    return [
        'username' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'name' => $faker->name,
        'gender' => $faker->randomElement(['M' ,'F']),
        'password' => $password ?: $password = bcrypt('123456'),
        'profile_picture' => $faker->image($filepath,400, 300),
        'remember_token' => str_random(10),
    ];
});
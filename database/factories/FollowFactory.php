<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Follow::class, function (Faker $faker) {
    return [
        'user_id'=>\App\Models\User::get()->random()->id,
        'follow_id'=>\App\Models\User::get()->random()->id,
    ];
});

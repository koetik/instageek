<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Comment::class, function (Faker $faker) {
    return [
        'user_id'=>\App\Models\User::get()->random()->id,
        'post_id'=>\App\Models\Post::get()->random()->id,
        'comment'=>$faker->text($maxNbChars = 200)
    ];
});

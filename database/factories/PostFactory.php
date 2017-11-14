<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Post::class, function (Faker $faker) {
	$storage_path     = 'storage/'.date("Ymd");
    $storage_path_abs = public_path($storage_path);

    if(!File::exists($storage_path_abs)){
        File::makeDirectory($storage_path_abs);
    }
    $fileName = $faker->image($storage_path_abs,400, 300, null, false);
    
    return [
        'user_id'=>\App\Models\User::get()->random()->id,
        'uid'=> str_random(16),
        'photo'=>$storage_path.'/'.$fileName,
        'caption'=>$faker->text($maxNbChars = 200),
    ];
});

<?php

use Illuminate\Database\Seeder;
use App\Models\Like;
class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Like::class, 20)->create();
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerFollowInsert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER follow_insert AFTER INSERT ON follows FOR EACH ROW
            BEGIN
                UPDATE users SET following_count = following_count+1 WHERE id = NEW.user_id;
                UPDATE users SET follower_count = follower_count+1 WHERE id = NEW.follow_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `follow_insert`');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table
                ->foreign('rsvp_one_id')
                ->references('id')
                ->on('users');
            $table
                ->foreign('rsvp_two_id')
                ->references('id')
                ->on('users');
            $table
                ->foreign('rsvp_three_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['rsvp_one_id']);
            $table->dropForeign(['rsvp_two_id']);
            $table->dropForeign(['rsvp_three_id']);
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
            $table->time('time');
            $table->string('venue');
            $table->unsignedBigInteger('rsvp_one_id');
            $table->unsignedBigInteger('rsvp_two_id')->nullable();
            $table->unsignedBigInteger('rsvp_three_id')->nullable();
            $table->string('cover')->nullable();
            $table->text('schedule');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}

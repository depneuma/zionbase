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
            $table->timestamp('date_time');
            $table->text('schedule');
            $table->string('venue');
            $table->string('cover')->default('covers/default.jpg');
            $table->unsignedBigInteger('rsvp_one_id');
            $table->unsignedBigInteger('rsvp_two_id')->nullable();
            $table->unsignedBigInteger('rsvp_three_id')->nullable();

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

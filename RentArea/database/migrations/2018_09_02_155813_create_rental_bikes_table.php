<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_bikes', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('bike_id')->unsigned()->index();
            $table->integer('branch_pickup')->unsigned()->index();
            $table->integer('branch_return')->unsigned()->index()->nullable();
            $table->date('pickupDate');
            $table->date('returnDate');
            $table->time('pickupTime');
            $table->time('returnTime');
            $table->integer('price');
            $table->integer('status')->default(0);
            $table->nullableTimestamps();
        });

        Schema::table('rental_bikes', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bike_id')->references('id')->on('bikes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('branch_pickup')->references('id')->on('branches');
            $table->foreign('branch_return')->references('id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental_bikes');
    }
}

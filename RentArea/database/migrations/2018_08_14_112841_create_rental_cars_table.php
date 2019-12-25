<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_cars', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('car_id')->unsigned()->index();
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

        Schema::table('rental_cars', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('rental_cars');
    }
}

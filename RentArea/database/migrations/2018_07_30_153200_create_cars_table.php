<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name');
            $table->integer('type_id')->unsigned()->nullable()->index();
            $table->boolean('ac')->default(true);
            /* Premium, Middle, Compact  etc*/
            $table->integer('gearbox_id')->unsigned()->nullable()->index();
            /* Manual, Automat */
            $table->integer('passengers');
            $table->integer('doors');
            $table->integer('capacity');
            /* Bags */
            $table->string('additional_info')->nullable();
            $table->integer('price_per_day_car');
            /* Optional*/
            $table->string('gps')->nullable();
            $table->string('baby_chair')->nullable();
            $table->string('child_seat')->nullable();
            $table->string('wifi_price')->nullable();
            $table->string('snow_chains')->nullable();
            $table->string('sky_support')->nullable();

            $table->integer('is_available')->nullable()->default(1);

            $table->integer('branch_id')->unsigned()->index();
            $table->integer('photo_id')->unsigned()->index();
            $table->integer('fuel_id')->unsigned()->nullable()->index();


            $table->nullableTimestamps();

        });

        Schema::table('cars', function($table) {
            $table->foreign('fuel_id')->references('id')->on('car_fuels')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('car_types')->onDelete('cascade');
            $table->foreign('gearbox_id')->references('id')->on('car_gearboxes')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}

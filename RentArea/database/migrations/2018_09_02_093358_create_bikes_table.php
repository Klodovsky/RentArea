<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name');
            $table->integer('photo_id')->unsigned()->index();

            $table->string('type');
            $table->string('bike_for');
            $table->string('handlebar_width');
            $table->string('max_weight');
            $table->string('wheel_size');
            $table->string('frame_size');
            $table->string('chain');

            $table->integer('price_per_day');

            $table->integer('is_available')->nullable()->default(1);

            $table->integer('branch_id')->unsigned()->index();

            $table->timestamps();
        });

        Schema::table('bikes', function($table) {
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
        Schema::dropIfExists('bikes');
    }
}

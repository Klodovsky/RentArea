<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motos', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name');
            $table->integer('photo_id')->unsigned()->index();

            $table->string('type');

            $table->string('max_weight');
            $table->string('max_speed');
            $table->string('fuel_economy');
            $table->string('engine');

            $table->integer('price_per_day');

            $table->integer('is_available')->nullable()->default(1);

            $table->integer('branch_id')->unsigned()->index();

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
        Schema::dropIfExists('motos');
    }
}

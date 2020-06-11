<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRationCompositions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ration_compositions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ration_id');
            $table->unsignedBigInteger('meal_id');
            $table->unsignedBigInteger('dish_id');
            $table->float('portion', 4, 2);

            $table->foreign('ration_id')->references('id')->on('rations')->onDelete('cascade');
            $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');
            $table->foreign('dish_id')->references('id')->on('dishes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ration_compositions');
    }
}

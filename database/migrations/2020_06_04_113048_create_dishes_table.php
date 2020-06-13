<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->smallInteger('weight')->unsigned()->nullable();
            $table->float('cost', 6, 2)->nullable();
            $table->float('price', 6, 2)->nullable();
            $table->float('protein', 5, 2)->nullable();
            $table->float('fat', 5, 2)->nullable();
            $table->float('carb', 5, 2)->nullable();
            $table->smallInteger('calories')->unsigned()->nullable();
            $table->float('step_of_portion', 4, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes');
    }
}

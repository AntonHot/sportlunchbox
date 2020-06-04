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
            $table->string('slug', 100);
            $table->smallInteger('weight')->unsigned();
            $table->float('cost', 6, 2);
            $table->float('price', 6, 2);
            $table->float('protein', 5, 2);
            $table->float('fat', 5, 2);
            $table->float('carb', 5, 2);
            $table->smallInteger('calories')->unsigned();
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

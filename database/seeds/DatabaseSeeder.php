<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DishSeeder::class);
        $this->call(MealSeeder::class);
        $this->call(RationSeeder::class);
        $this->call(RationCompositionsSeeder::class);
    }
}

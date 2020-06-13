<?php

use App\Models\Dish;
use App\Models\Meal;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;

class RationCompositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Meal::all() as $meal) {
            DB::table('ration_compositions')->insert([
                'ration_id' => 1,
                'meal_id' => $meal->id,
                'dish_id' => Dish::all()->random()->id,
                'portion' => Arr::random([0.75, 1, 1.25, 1.5]),
            ]);
            DB::table('ration_compositions')->insert([
                'ration_id' => 2,
                'meal_id' => $meal->id,
                'dish_id' => Dish::all()->random()->id,
                'portion' => Arr::random([0.75, 1, 1.25, 1.5]),
            ]);
        }
        
    }
}

<?php

use App\Models\Dish;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dish = new Dish();
        $dish->name = 'Гранола с йогуртом';
        $dish->weight = 157;
        $dish->cost = 29;
        $dish->price = 101.5;
        $dish->protein = 9.7;
        $dish->fat = 14.7;
        $dish->carb = 47.6;
        $dish->calories = 362;
        $dish->step_of_portion = Dish::STEP_DEFAULT;
        $dish->save();

        DB::table('dishes')->insert([
            'name' => 'Куриный бульон с зеленью',
            'weight' => 209,
            'cost' => 26,
            'price' => '91',
            'protein' => '8.6',
            'fat' => '5.7',
            'carb' => '0.5',
            'calories' => 87,
            'step_of_portion' => '0.5',
        ]);
    }
}
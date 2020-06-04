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
        $name = 'Гранола с йогуртом';
        DB::table('dishes')->insert([
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'weight' => 156,
            'cost' => 29,
            'price' => '101.5',
            'protein' => '9.7',
            'fat' => '14.7',
            'carb' => '47.6',
            'calories' => 362,
            'step_of_portion' => Dish::STEP_DEFAULT,
        ]);

        $name = 'Куриный бульон с зеленью';
        DB::table('dishes')->insert([
            'name' => $name,
            'slug' => Str::slug($name, '-'),
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
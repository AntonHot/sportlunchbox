<?php

use App\Models\Meal;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;
        $names = [
            'breakfast1' => 'Завтрак 1',
            'breakfast2' => 'Завтрак 2',
            'lunch1' => 'Первое',
            'lunch2' => 'Второе',
            'snack' => 'Перекус',
            'dinner' => 'Ужин',
        ];
        foreach ($names as $code => $name) {
            $meal = new Meal();
            $meal->name = $name;
            $meal->code = $code;
            $meal->order = $i++;
            $meal->save();
        }
    }
}

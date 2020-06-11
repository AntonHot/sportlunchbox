<?php

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
            'lunch' => 'Обед',
            'snack' => 'Перекус'
        ];
        foreach ($names as $code => $name) {
            DB::table('meals')->insert([
                'name' => $name,
                'code' => $code,
                'order' => $i++
            ]);
        }
    }
}

<?php

use App\Models\Ration;
use Illuminate\Database\Seeder;

class RationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rations')->insert([
            'date' => date('Y-m-d'),
            'size' => Ration::SIZES[array_rand(Ration::SIZES)]
        ]);
        DB::table('rations')->insert([
            'date' => date('Y-m-d'),
            'size' => Ration::SIZES[array_rand(Ration::SIZES)]
        ]);
    }
}

<?php

use App\Helpers\RationDate;
use App\Models\Ration;
use Illuminate\Support\Arr;
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
        for ($i = 0; $i < 2; $i++) { 
            $ration = new Ration();
            $ration->date = RationDate::today();
            $ration->size = Arr::random(Ration::SIZES);
            $ration->save();
        }
    }
}

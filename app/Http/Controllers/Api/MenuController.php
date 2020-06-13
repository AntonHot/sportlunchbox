<?php

namespace App\Http\Controllers\Api;

use App\Models\Ration;
use App\Helpers\RationDate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display rations from date to date
     *
     * @return \Illuminate\Http\Response
     */
    public function days($from = null, $to = null)
    {
        if (empty($from)) {
            $from = RationDate::today();
        }

        if (empty($to)) {
            $rations = Ration::where('date', '>=', $from)->get();
        } else {
            $rations = Ration::whereBetween('date', [$from, $to])->get();
        }

        foreach ($rations as $ration) {
            $meals = [];
            foreach ($ration->compositions as $comp) {
                $meal = $comp->meal;
                $dish = $meal->dish->first();
                $meals[] = [
                    'name' => $meal->name,
                    'code' => $meal->code,
                    'order' => $meal->order,
                    'portion' => $comp->portion,
                    'dish' => [
                        'name' => $dish->name,
                        'protein' => $dish->protein,
                        'fat' => $dish->fat,
                        'carb' => $dish->carb,
                        'calories' => $dish->calories,
                        'weight' => $dish->weight,
                        'cost' => $dish->cost,
                        'price' => $dish->price,
                        'step_of_portion' => $dish->step_of_portion,
                    ],
                ];
            }

            $result[] = [
                'id' => $ration->id,
                'date' => $ration->date,
                'size' => $ration->size,
                'meals' => $meals,
            ];
        }

        return $result;
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Dish;
use App\Models\Meal;
use App\Models\Ration;
use App\Helpers\RationDate;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\RationComposition;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rations = Ration::all();

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ration = new Ration();
        $ration->date = RationDate::today();
        $ration->size = Arr::random($ration::SIZES);
        $ration->save();

        $meals = Meal::all();

        foreach ($meals as $meal) {            
            $dish = Dish::find(rand(1, 2));
    
            $comp = new RationComposition();
            $ration->compositions()->save($comp);
            $comp->meal()->associate($meal);
            $comp->dish()->associate($dish);
            $comp->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function list(Request $request) {
        $dateFrom = $request->dateFrom;
        $dateTo = $request->dateTo;

        $rations = DB::table('rations')->where([
            ['date', '>=', $dateFrom],
            ['date', '<=', $dateTo],
        ])->orderBy('date', 'asc')->get('id');

        if ($rations->isEmpty()) {
            return [];
        }
        
        foreach ($rations as $item) {
            $ration = Ration::where('id', $item->id)->first();

            $meals = [];
            // $rationCost = 0;
            // $rationPrice = 0;
            // $rationCalories = 0;
            // $rationProtein = 0;
            // $rationFat = 0;
            // $rationCarb = 0;
            foreach ($ration->compositions as $comp) {
                $meal = $comp->meal;
                $dish = $comp->dish;

                // $rationCost += $dish->cost;
                // $rationPrice += $dish->price;
                // $rationCalories += $dish->calories;
                // $rationProtein += $dish->protein;
                // $rationFat += $dish->fat;
                // $rationCarb += $dish->carb;

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
                // 'params' => [
                //     'cost' => round($rationCost, 2),
                //     'price' => round($rationPrice, 2),
                //     'calories' => $rationCalories,
                //     'protein' => round($rationProtein, 1),
                //     'fat' => round($rationFat, 1),
                //     'carb' => round($rationCarb, 1),
                // ],
            ];
        }

        return $result;
    }
}

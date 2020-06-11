<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\Ration;

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
                    'meal' => $meal->name,
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
        //
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
}

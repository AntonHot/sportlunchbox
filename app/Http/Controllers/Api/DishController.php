<?php

namespace App\Http\Controllers\Api;

use App\Models\Dish;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DishResource;

class DishController extends Controller
{
    public function index() {
        return DishResource::collection(Dish::all());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $dish = Dish::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name'), '-'),
            'weight' => $request->input('weight'),
            'cost' => $request->input('cost'),
            'price' => $request->input('price'),
            'protein' => $request->input('protein'),
            'fat' => $request->input('fat'),
            'carb' => $request->input('carb'),
            'calories' => $request->input('calories'),
            'step_of_portion' => $request->input('step_of_portion'),
        ]);
        dd($dish);
    }
}

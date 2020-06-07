<?php

namespace App\Http\Controllers\Api;

use App\Models\Dish;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DishResource;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DishResource::collection(Dish::all());
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
            'step_of_portion' => $request->input('step_of_portion') || Dish::STEP_DEFAULT,
        ]);
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
        $dish = Dish::find($id);
        $dish->fill([
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name'), '-'),
            'weight' => $request->get('weight'),
            'cost' => $request->get('cost'),
            'price' => $request->get('price'),
            'protein' => $request->get('protein'),
            'fat' => $request->get('fat'),
            'carb' => $request->get('carb'),
            'calories' => $request->get('calories'),
            'step_of_portion' => $request->get('step_of_portion') || Dish::STEP_DEFAULT,
        ]);
        dd($dish->save());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dish::find($id)->delete();
    }
}

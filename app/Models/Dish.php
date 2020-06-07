<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    const STEP_DEFAULT = '0.25';

    public $timestamps = false;

    protected $attributes = [
        'step_of_portion' => self::STEP_DEFAULT,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'weight',
        'cost',
        'price',
        'protein',
        'fat',
        'carb',
        'calories',
    ];
}

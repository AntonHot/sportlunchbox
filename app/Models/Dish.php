<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    const STEP_DEFAULT = '0.25';
    
    protected $table = 'dishes';

    public $timestamps = false;

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
        'step_of_portion',
    ];
}

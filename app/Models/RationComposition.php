<?php

namespace App\Models;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Model;

class RationComposition extends Model
{
    protected $table = 'ration_compositions';

    public $timestamps = false;

    const PORTION_DEFAULT = 1;

    protected $attributes = [
        'portion' => self::PORTION_DEFAULT,
    ];

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
}

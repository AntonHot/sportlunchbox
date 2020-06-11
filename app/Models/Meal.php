<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    public $timestamps = false;

    public function dish()
    {
        return $this->belongsToMany(Dish::class, 'ration_compositions');
    }
}

<?php

namespace App\Models;

use App\Models\RationComposition;
use Illuminate\Database\Eloquent\Model;

class Ration extends Model
{
    public $timestamps = false;

    const SIZES = [800, 1000, 1200, 1400, 1600, 1800, 2000];

    public function compositions()
    {
        return $this->hasMany(RationComposition::class);
    }

    public function meals() {
        return $this->belongsToMany(Meal::class, 'ration_compositions');
    }

    public function dishes() {
        return $this->belongsToMany(Dish::class, 'ration_compositions');
    }
}

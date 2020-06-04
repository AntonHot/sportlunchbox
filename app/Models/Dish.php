<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    const STEP_DEFAULT = '0.25';
    
    protected $table = 'dishes';
}

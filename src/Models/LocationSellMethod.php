<?php

namespace nbmod\swap\Models;

use Illuminate\Database\Eloquent\Model;

class LocationSellMethod extends Model
{

    protected $casts = [
        'methods' => 'array'
    ];
}

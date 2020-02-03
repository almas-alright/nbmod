<?php

namespace Nbmod\Swap\Models;

use Illuminate\Database\Eloquent\Model;

class LocationSellMethod extends Model
{

    protected $casts = [
        'methods' => 'array'
    ];
}

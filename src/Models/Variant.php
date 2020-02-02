<?php

namespace nbmod\swap\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'variant_name',
        'variant_input_type',
        'variant_default'
    ];
}

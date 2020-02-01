<?php

namespace nbmod\swap;

use Illuminate\Database\Eloquent\Model;

class AdditionalPurchaseQuery extends Model
{
    public $timestamps = false;
    protected $fillable = ['product_id', 'check_amenity_covenant', 'no_amenity_covenant_value', 'amenity_covenant_info', 'check_required_images', 'required_images'];
    protected $casts = [
        'amenity_covenant_info' => 'array',
        'required_images' => 'array'
    ];
}

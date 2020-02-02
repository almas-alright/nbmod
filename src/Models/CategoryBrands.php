<?php

namespace nbmod\swap\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryBrands extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'product_category_id', 'product_brand_id'
    ];
}

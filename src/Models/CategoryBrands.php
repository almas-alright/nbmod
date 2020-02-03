<?php

namespace Nbmod\Swap\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryBrands extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'product_category_id', 'product_brand_id'
    ];
}

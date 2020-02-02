<?php

namespace nbmod\swap\Models;

use nbmod\swap\Models\Models\Sell\ModelProducts;
use Illuminate\Database\Eloquent\Model;

class SeriesOfBrand extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'title',
        'slug',
        'product_brand_id',
        'product_category_id',
        'is_active',
    ];

    public function products(){
        return $this->hasMany(ModelProducts::class,'product_series_id','id');
    }
    public function brand(){
        return $this->belongsTo(ProductBrand::class,'product_brand_id');
    }
    public function category(){
        return $this->belongsTo(ProductCategory::class,'product_category_id');
    }
}

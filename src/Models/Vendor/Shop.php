<?php

namespace nbmod\swap\Vendor;

use App\ProductCategory;
use App\Location;
use nbmod\swap\Vendor\Vendor;
use nbmod\swap\Vendor\Nature;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function nature(){
        return $this->belongsToMany(Nature::class, 'shop_natures');
    }
    public function category(){
        return $this->belongsToMany(ProductCategory::class, 'shop_categories', 'shop_id', 'category_id', 'id', 'id');
    }
    public function vendor(){
        return $this->hasOne(Vendor::class, 'id', 'vendor_id');
    }
    public function location(){
        return $this->hasOne(Location::class, 'id', 'location_id');
    }
    public function shoparea(){
        return $this->hasOne(Location::class, 'id', 'area_id');
    }

}

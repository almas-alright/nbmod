<?php

namespace Nbmod\Swap\Models\Vendor;


use Nbmod\Swap\Models\ProductCategory;
use Nbmod\Swap\Models\Location;
use Nbmod\Swap\Models\Sell\SellRequest;
use Nbmod\Swap\Models\Vendor\Vendor;
use Nbmod\Swap\Models\Vendor\Nature;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $hidden = [
        'pivot'
    ];
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
    public function users(){
        return $this->belongsToMany(Vendor::class,'shop_users');
    }

    public function buyrequest(){
        return $this->hasMany(SellRequest::class,'shop_id', 'id');
    }

}

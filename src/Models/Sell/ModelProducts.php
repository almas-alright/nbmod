<?php

namespace nbmod\swap\Sell;

use nbmod\swap\Admin;
use App\ProductBrand;
use App\ProductCategory;
use App\SeriesOfBrand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelProducts extends Model
{
    use SoftDeletes;
    public $timestamps = false;

    protected $appends = ['path_name', 'image_name'];

//    protected $attributes = ['path', 'image'];
    public function metas()
    {
        return $this->hasMany(ModelProductMeta::class, 'product_id', 'id');
    }

    public function variants()
    {
        return $this->hasMany(ModelProductVariant::class, 'product_id', 'id')->with('variant_of');
    }

    public function vendor()
    {
        return $this->belongsTo(Admin::class, 'vendor_id', 'id');
    }

    public function series()
    {
        return $this->belongsTo(SeriesOfBrand::class, 'product_series_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(ProductBrand::class, 'product_brand_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }


//    public function getFeaturedImageAttribute($value)
//    {
//        if($value != ""){
//        $tfe = explode('/', $value);
//            $this->setPathNameAttribute($tfe[0]."/".$tfe[1]."/");
//            $this->setImageNameAttribute($tfe[2]);
//            $fe = ['path' => $tfe[0]."/".$tfe[1]."/", 'image' => $tfe[2]];
//        } else {
//            $fe = [];
//        }
//        return $fe; //strtoupper($value);
//    }

    public function setPathNameAttribute($value)
    {
        $this->attributes['path'] = $value;
    }

    public function setImageNameAttribute($value)
    {
        $this->attributes['image'] = $value;
    }

    public function getPathNameAttribute()
    {
        $fi = $this->breakFa($this->featured_image);
        if (!empty($fi)) {
            return $fi['path'];
        } else {
            return NULL;
        }
    }

    public function getImageNameAttribute()
    {
        $fi = $this->breakFa($this->featured_image);
        if (!empty($fi)) {
            return $fi['image'];
        } else {
            return NULL;
        }
    }

    public function breakFa($value)
    {
        if ($value != "") {
            $tfe = explode('/', $value);
            $fe = ['path' => $tfe[0] . "/" . $tfe[1] . "/", 'image' => $tfe[2]];
        } else {
            $fe = [];
        }
        return $fe; //strtoupper($value);
    }
//    protected $visible = ['path', 'image'];

}

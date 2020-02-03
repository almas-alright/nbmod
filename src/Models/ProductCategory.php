<?php

namespace Nbmod\Swap\Models;


use Illuminate\Database\Eloquent\Model;
use Nbmod\Swap\Models\ProductBrand;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Nbmod\Swap\S3;

class ProductCategory extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    public $fillable = ['title', 'slug', 'description', 'image', 'banner', 'parent_id', 'is_active', 'is_use_for_sell'];
    protected $hidden = ['pivot'];

    public function childs() {
        return $this->hasMany('ProductCategory','parent_id');
    }
    public function parent() {
        return $this->belongsTo('Nbmod\Swap\Models\ProductCategory','parent_id');
    }
    public static function categories($id){
        return static::whereParentId($id)->get();
    }

    public function brands(){
        return $this->belongsToMany(ProductBrand::class, 'category_brands');
    }

//    public function getImageAttribute($value){
//        if($value != NULL && $value != ''){
//            return S3::getFile($value);
//        }
//    }
//
//    public function getBannerAttribute($value){
//        if($value != NULL && $value != ''){
//            return S3::getFile($value);
//        }
//    }
}

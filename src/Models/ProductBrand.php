<?php

namespace nbmod\swap\Models;

//use nbmod\swap\S3;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductBrand extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    public $fillable = ['title', 'slug', 'description', 'logo', 'banner'];
    protected $hidden = ['pivot'];

//    public function getLogoAttribute($value){
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

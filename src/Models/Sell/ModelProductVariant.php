<?php

namespace nbmod\swap\Models\Sell;

use nbmod\swap\Models\Variant;
use Illuminate\Database\Eloquent\Model;

class ModelProductVariant extends Model
{
    public $timestamps = false;
    protected $fillable = ['product_id', 'variant_id', 'variant_name', 'variant_value'];
    protected $nbmod\swap\Modelsends = ['key_value'];
    protected $casts = [
        'variant_value' => 'array'
    ];

    public function variant_of()
    {
        return $this->belongsTo(Variant::class, 'variant_id');
    }

//    public function getVariantValueAttribute($value)
//    {
//        $newVal = array();
//        if (!empty((array)$value)) {
//            foreach ((array)$value as $val) {
//                $tempVal = (array) json_decode($val);
//                foreach ($tempVal as $key => $tag){
//                    array_push($newVal, ['key' => $key, 'value' => $tag]);
//                }
//            }
//        }
//        return $newVal;
//    }

    public function getKeyValueAttribute()
    {
        $newVal = array();
        if (!empty((array)$this->variant_value)) {
            foreach ((array)$this->variant_value as $key => $val) {
                    array_push($newVal, ['key' => $key, 'value' => $val]);
              }
        }
        return $newVal;
    }
}

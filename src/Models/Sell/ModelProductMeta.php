<?php

namespace nbmod\swap\Sell;

use Illuminate\Database\Eloquent\Model;

class ModelProductMeta extends Model
{
    public $timestamps = false;
    protected $fillable = ['product_id', 'key'];
}
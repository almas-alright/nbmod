<?php

namespace nbmod\swap;

use Illuminate\Database\Eloquent\Model;

class ModelProductMeta extends Model
{
    public $timestamps = false;
    protected $fillable = ['product_id', 'key'];
}

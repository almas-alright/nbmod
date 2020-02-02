<?php

namespace nbmod\swap\Models\Sell;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseQuerySection extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    public $fillable = ['order', 'product_id', 'title', 'description', 'queries'];

    protected $casts = [
        'queries' => 'array'
    ];
    protected $hidden = ['deleted_at'];

}

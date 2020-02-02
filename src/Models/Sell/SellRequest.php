<?php

namespace nbmod\swap\Models\Sell;

use nbmod\swap\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SellRequest extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $appends = ['qa_user'];
    protected $fillable =
        [
            'model_product_id',
            'address_id',
            'location_id',
            'area_id',
            'vendor_id',
            'address_id',
            'base_price',
            'final_price',
            'pickup_method',
            'payment_method',
            'payment_method_option',
            'payout_number',
            'assigned_kam',
            'bill_attach',
            'required_image',
            'variants',
            'warrenty_info'
        ];
    protected $casts = [
        'bill_attach' => 'array',
        'required_image' => 'array',
        'variants' => 'array',
        'warrenty_info' => 'array'
    ];

    public function getQaUserAttribute(){
        return SellingAnswer::where('sell_request_id', $this->id)->where('user_id', $this->user_id)->first();
    }

    public function seller(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product(){
        return $this->belongsTo(ModelProducts::class, 'model_product_id', 'id');
    }
}

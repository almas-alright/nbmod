<?php

namespace nbmod\swap\Sell;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class PurchaseQuery extends Model
{
    use SoftDeletes;
//    use Searchable;
    public $timestamps = false;
    public $fillable = ['quest', 'type'];
    protected $hidden = ['deleted_at'];
    protected $casts = ['default_opt' => 'array'];


}

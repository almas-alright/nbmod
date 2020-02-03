<?php

namespace Nbmod\Swap\Models;

use Illuminate\Database\Eloquent\Model;

class BdLocation extends Model
{
    protected $table = 'bd_location';

    public static function getChildOf($parent = 0){
        return static::whereParentId($parent)->get();
    }
}

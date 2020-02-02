<?php

namespace nbmod\swap\Models;

use Illuminate\Database\Eloquent\Model;
use nbmod\swap\Models\LocationSellMethod;

class Location extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public $timestamps = false;

    protected $table = 'locations';
    protected $appends = ['sell_method'];
    protected $fillable = [
        'name', 'parent_id', 'bangla_name', 'active'
    ];

    public function parent() {
        return $this->belongsTo('nbmod\swap\Models\Location','parent_id');
    }

    public static function getChildOf($parent = 0){
        return static::whereParentId($parent)->get();
    }

    public function getSellMethodAttribute() {
        return LocationSellMethod::where('location_id', $this->id)->get()->first();
    }
}

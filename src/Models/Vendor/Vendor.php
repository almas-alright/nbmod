<?php

namespace nbmod\swap\Models\Vendor;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public function role(){
        return $this->belongsToMany(Conduct::class, 'vendor_conducts');
    }
    public function shops(){
        return $this->hasMany(Shop::class, 'vendor_id', 'id');
    }
    protected $hidden = [
        'password', 'remember_token',
    ];
}

<?php

namespace Nbmod\Swap\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecialOffer extends Model
{
    use SoftDeletes;
    public $timestamps = false;
}

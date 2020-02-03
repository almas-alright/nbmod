<?php

namespace Nbmod\Swap\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use SoftDeletes;
    protected $fillable = [

        'user_id', 'path', 'name', 'created_at'

    ];
}

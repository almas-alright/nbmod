<?php

namespace Nbmod\Swap\Models;

use Illuminate\Database\Eloquent\Model;

class Otps extends Model
{
    protected $fillable = [
        'mobile_number', 'otp', 'expired', 'verified', 'purpose', 'created_at' //'password',
    ];
}

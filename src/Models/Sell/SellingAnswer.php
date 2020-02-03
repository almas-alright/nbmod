<?php

namespace Nbmod\Swap\Models\Sell;

use Illuminate\Database\Eloquent\Model;

class SellingAnswer extends Model
{
    protected $fillable =
        [
            'sell_request_id', 'user_id', 'question_section'
        ];
    protected $casts = ['question_section' => 'array'];
}

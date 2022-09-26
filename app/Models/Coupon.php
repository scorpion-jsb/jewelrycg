<?php

namespace App\Models;

use App\Models\Traits\FormatPrices;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use FormatPrices;

    protected $fillable = [
        'name', 'type', 'amount', 'limit'
    ];
}

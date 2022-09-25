<?php

namespace App\Models;

use App\Models\Traits\FormatPrices;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use FormatPrices;

    protected $fillable = [
        'name', 'type', 'limit'
    ];

    public function setLimitToFloat()
    {
        $this->limit = number_format($this->limit / 100, 2);
        return $this;
    }

}

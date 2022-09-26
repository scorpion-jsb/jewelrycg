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

    public function setValuesToFloat()
    {
        $this->amount = number_format($this->amount / 100, 2);
        $this->limit = number_format($this->limit / 100, 2);
        return $this;
    }

}

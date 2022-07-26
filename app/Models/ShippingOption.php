<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];

    public function getOption($product_id) {
        $row = ProductShippingOption::where('product_id', $product_id)->where('shipping_option_id', $this->id)->first();

        return $row;
    }
}

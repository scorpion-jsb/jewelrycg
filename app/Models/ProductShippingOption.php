<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductShippingOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'shipping_option_id',
        'price'
    ];
}

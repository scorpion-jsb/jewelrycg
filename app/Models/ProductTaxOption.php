<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTaxOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'tax_option_id',
        'price'
    ];

}

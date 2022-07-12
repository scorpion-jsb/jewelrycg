<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'product_id',
        'price',
        'quantity',
        'image',
        'sku',
        'digital_download_assets',
    ];
}

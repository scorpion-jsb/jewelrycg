<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'variant_name',
        'variant_price',
        'variant_sku',
        'variant_quantity',
        'variant_thumbnail',
        'digital_download_assets',
        'digital_download_assets_count',
        'digital_download_assets_limit',
    ];
}

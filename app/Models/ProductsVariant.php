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
        'variant_assets',
        'digital_download_assets',
        'digital_download_assets_count',
        'digital_download_assets_limit',
    ];

    public function uploads()
    {
        return $this->hasOne(Upload::class, 'id', 'variant_thumbnail')->withDefault([
            'file_name' => "none.png",
            'id' => null
        ]);
    }

    public function asset()
    {
        return $this->hasOne(Upload::class, 'id', 'digital_download_assets')->withDefault([
            'file_name' => "none",
            'file_original_name' => 'none',
            'id' => null,
            'extension' => ''
        ]);
    }

}

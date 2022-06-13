<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_order',
        'id_product',
        'qty',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}

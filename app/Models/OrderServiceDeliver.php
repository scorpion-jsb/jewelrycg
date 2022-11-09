<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderServiceDeliver extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'message',
        'attachment',
        'delivered_at',
    ];

    public function order()
    {
        return $this->belongsTo(ServiceOrder::class, 'order_id', 'id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderServiceRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'requirement_id',
        'answer',
    ];

    public function order()
    {
        $this->hasOne(ServiceOrder::class, 'order_id', 'id');
    }

    public function requirement()
    {
        $this->hasOne(ServiceRequirement::class, 'requirement_id', 'id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerWalletWithdrawal extends Model
{
    use HasFactory;

    public function method()
    {
        return $this->belongsTo(SellerPaymentMethod::class, 'payment_method_id', 'id');
    }
}
<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        // 'address1',
        // 'address2',
        'status',
        'message',
        'tracking_number',
        'total_price',
    ];

    public function insertCartProducts()
    {
        $cart_items = Cart::content();
        $cart_items = $cart_items->map(function($i, $k) {
            $i->model->decrement('qty', $i->qty);
            return [
                'id_product' => $i->id,
                'qty' => $i->qty,
                'price' => $i->price
            ];
        });
        $this->items()->createMany($cart_items->toArray());
    }

    public static function getCartTotalInCents()
    {
        $total_price_float = Cart::total() * 100;
        return (int) $total_price_float;
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'id_order');
    }
}

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
        'address1',
        'address2',
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
                'price' => Product::getPriceInCents($i->price)
            ];
        });
        $this->items()->createMany($cart_items->toArray());
    }

    public function restoreProductsQty()
    {
        Cart::content()->map(fn($i, $k) => $i->model->increment('qty', $i->qty));
    }

    public function restoreCartItems()
    {
        $this->items->map(fn($i, $k) => Cart::add(
                $i->id,
                $i->product->name,
                $i->qty,
                $i->price / 100
            )
            ->associate(Product::class)
        );
    }

    public static function getCartTotalInCents()
    {
        $total_price_float = Cart::total(2, '.', '') * 100;
        return (int) $total_price_float;
    }

    public function formatPrice()
    {
        $this->total_price = number_format($this->total_price / 100, 2);
        return $this;
    }

    public static function changeCartInstanceIfBuyNowMode(bool $buy_now_mode)
    {
        if($buy_now_mode)
        {
            Cart::instance('buy_now');
        }
        else
        {
            Cart::instance('default');
        }
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'id_order');
    }
}

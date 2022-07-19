<?php

namespace App\Models;

use App\Http\Requests\UpdateOrderRequest;
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

    public static $status_list = [
        'Processing',
        'Processed',
        'Shipped',
        'Delivered'
    ];

    public static function getBasedOnUser()
    {
        if(auth()->user()->is_admin)
        {
            return Order::withCount('items')->orderBy('id')->paginate(10);
        }
        
        return auth()->user()->orders()->withCount('items')->orderBy('id')->paginate(10);
    }

    public static function getPendingBasedOnUser()
    {
        if(auth()->user()->is_admin)
        {
            return Order::where('status', 'Processing')->withCount('items')->orderBy('id')->paginate(10);
        }
        
        return auth()->user()->orders()->where('status', 'Processing')->withCount('items')->orderBy('id')->paginate(10);
    }

    public static function getCartTotalInCents()
    {
        $total_price_float = Cart::total(2, '.', '') * 100;
        return (int) $total_price_float;
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

    public function adminUpdate(UpdateOrderRequest $req)
    {
        $data = $req->only('message');
        if(in_array($req->status, Order::$status_list))
        {
            $data['status'] = $req->status;
        }
        $this->update($data);
    }

    public function insertCartProducts()
    {
        $cart_items = Cart::content();
        $cart_items = $cart_items->map(function($i, $k) {
            $i->model->decrement('quantity', $i->quantity);
            return [
                'id_product' => $i->id,
                'quantity' => $i->quantity,
                'price' => Product::getPriceInCents($i->price)
            ];
        });
        $this->items()->createMany($cart_items->toArray());
    }

    public function restoreProductsQuantity()
    {
        Cart::content()->map(fn($i, $k) => $i->model->increment('quantity', $i->quantity));
    }

    public function restoreCartItems()
    {
        $this->items->map(fn($i, $k) => Cart::add(
                $i->id,
                $i->product->name,
                $i->quantity,
                $i->price / 100
            )
            ->associate(Product::class)
        );
    }

    public function formatPrice()
    {
        $this->total_price = number_format($this->total_price / 100, 2);
        return $this;
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'id_order');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

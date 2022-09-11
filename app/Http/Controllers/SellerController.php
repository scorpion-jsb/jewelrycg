<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;

class SellerController extends Controller
{
    //
    public function dashboard(){
        $carts = Cart::instance('default')->content();
        $orders = Order::where('user_id', auth()->id())->withCount('items')->get();

        $orderCount = 0;
        foreach ($orders as $order) {
            $orderCount += $order->items_count;
        }

        $wishlists = Cart::instance('wishlist')->content();

        $purchases = Order::where('user_id', auth()->id())->where('status_payment', 2)->with('items')->get();

        return view('seller.dashboard')->with(['carts' => count($carts), 'orders' => $orderCount, 'wishlists' => count($wishlists), 'purchases' => $purchases]);        
    }
}

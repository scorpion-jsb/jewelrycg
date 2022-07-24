<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;

use function PHPSTORM_META\type;

class AppController extends Controller
{
    public function index()
    {
        //$products = cache()->remember('todays-deals', 60*60*24, fn() => Product::getTodaysDeals());
        $products = Product::orderBy('id', 'DESC')->get();
        $products->each(function($product) {
            $product->setPriceToFloat();
        });
        return view('index', compact('products'));
    }

    function dashboard() {
        $carts = Cart::instance('default')->content();
        $orders = Order::where('user_id', Auth::user()->id)->withCount('items')->get();

        $orderCount = 0;
        foreach ($orders as $order) {
            $orderCount += $order->items_count;
        }

        $wishlists = Cart::instance('wishlist')->content();

        $purchases = Order::where('user_id', Auth::user()->id)->where('status_payment', 2)->with('items')->get();

        return view('dashboard')->with(['carts' => count($carts), 'orders' => $orderCount, 'wishlists' => count($wishlists), 'purchases' => $purchases]);
    }
}

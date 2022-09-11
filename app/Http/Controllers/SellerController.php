<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\Attribute;
use App\Models\ProductsCategorie;
use App\Models\ProductTag;
use App\Models\ProductsTaxOption;

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
    /**
     * Show seller'sproduct create view
     */
    public function productCreate(){
        return view('seller.products.create',[
            'attributes' => Attribute::orderBy('id', 'DESC')->get(),
            'categories' => ProductsCategorie::all(),
            'tags' => ProductTag::all(),
            'taxes' => ProductsTaxOption::all()
        ]);
    }
}

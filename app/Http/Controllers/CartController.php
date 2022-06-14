<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartItemEditRequest;
use App\Http\Requests\StoreProductCartRequest;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function store(StoreProductCartRequest $req)
    {
        $product = Product::findOrFail($req->id_product);
        if($product->qty < 1)
        {
            return back();
        }

        Cart::instance('default')->add(
            $product->id,
            $product->name,
            1,
            $product->price / 100
        )
        ->associate(Product::class);

        if(auth()->check())
        {
            Cart::restore(auth()->id());
            Cart::store(auth()->id());
        }

        return redirect()->route('product.page', $product->id)->with(['message' => 'Successfully added to Cart!']);
    }

    public function buyNow(StoreProductCartRequest $req)
    {
        $product = Product::findOrFail($req->id_product);
        Cart::instance('buy_now')->destroy();
        Cart::instance('buy_now')->add(
            $product->id,
            $product->name,
            1,
            $product->price / 100
        )
        ->associate(Product::class);

        Cart::restore(auth()->id());
        Cart::store(auth()->id());

        return view('checkout', ['buy_now_mode' => 1]); 
    }

    public function editQty(CartItemEditRequest $req)
    {
        Cart::instance('default')->update($req->row_id, $req->qty);
        if(auth()->check())
        {
            Cart::restore(auth()->id());
            Cart::update($req->row_id, $req->qty);
            Cart::store(auth()->id());
        }
        return redirect()->route('cart.index');
    }

    public function removeProduct(CartItemEditRequest $req)
    {
        try
        {
            Cart::instance('default')->remove($req->row_id);
            if(auth()->check())
            {
                Cart::restore(auth()->id());
                Cart::remove($req->row_id);
                Cart::store(auth()->id());
            }
        }
        finally
        {
            return redirect()->route('cart.index');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartItemEditRequest;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function store(Request $req)
    {
        $product = Product::findOrFail($req->id_product);

        Cart::add(
            $product->id,
            $product->name,
            1,
            $product->price / 100
        )
        ->associate('Product');

        if(auth()->check())
        {
            Cart::restore(auth()->id());
            Cart::store(auth()->id());
        }

        return redirect()->route('product.page', $product->id)->with(['message' => 'Successfully added to Cart!']);
    }

    public function editQty(CartItemEditRequest $req)
    {
        Cart::update($req->row_id, $req->qty);
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
        Cart::remove($req->row_id);
        if(auth()->check())
        {
            Cart::restore(auth()->id());
            Cart::remove($req->row_id);
            Cart::store(auth()->id());
        }
        return redirect()->route('cart.index');
    }
}

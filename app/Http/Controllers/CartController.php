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
        );


        return back()->with(['message' => 'Successfully added to Cart!']);
    }

    public function editQty(CartItemEditRequest $req)
    {
        Cart::update($req->row_id, $req->qty);
        return back();
    }

    public function removeProduct(CartItemEditRequest $req)
    {
        Cart::remove($req->row_id);
        return back();
    }

    // public function show($id)
    // {
    //     //
    // }

    // public function edit($id)
    // {
    //     //
    // }

    // public function create()
    // {
    //     //
    // }

    // public function destroy($id)
    // {
    //     //
    // }
}

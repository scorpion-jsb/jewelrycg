<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartItemEditRequest;
use App\Http\Requests\RemoveFromWishlistRequest;
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

        return redirect()->route('products.show', $product->id)->with(['message' => 'Successfully added to Cart!']);
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

    public function wishlist()
    {
        Cart::instance('wishlist')->restore(auth()->id());
        Cart::instance('wishlist')->store(auth()->id());
        return view('users.wishlist');
    }

    public function wishlistStore(StoreProductCartRequest $req)
    {
        $product = Product::findOrFail($req->id_product);

        Cart::instance('wishlist')->add(
            $product->id,
            $product->name,
            1,
            $product->price / 100
        )
        ->associate(Product::class);

        Cart::restore(auth()->id());
        Cart::store(auth()->id());

        return redirect()->route('products.show', $product->id)->with(['wishlist-message' => 'Successfully added to Wishlist!']);
    }

    public function removeFromWishlist(RemoveFromWishlistRequest $req)
    {
        Cart::instance('wishlist')->restore(auth()->id());
        Cart::remove($req->row_id);
        Cart::store(auth()->id());

        return back();
    }

    public function wishlistToCart(RemoveFromWishlistRequest $req)
    {
        $product = Cart::instance('wishlist')->get($req->row_id)->model;

        Cart::instance('wishlist')->restore(auth()->id());
        Cart::remove($req->row_id);
        Cart::store(auth()->id());

        Cart::instance('default')->add(
            $product->id,
            $product->name,
            1,
            $product->price / 100
        )
        ->associate(Product::class);

        Cart::restore(auth()->id());
        Cart::store(auth()->id());

        return redirect()->route('cart.wishlist');
    }
}

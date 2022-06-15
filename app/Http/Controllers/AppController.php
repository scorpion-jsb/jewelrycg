<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $products = cache()->remember('index', 60, fn() => Product::with('images')->get());
        $products->transform(fn($i, $k) => $i->setPriceToFloat());
        return view('index', compact('products'));
    }
}

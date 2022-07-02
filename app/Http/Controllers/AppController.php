<?php

namespace App\Http\Controllers;

use App\Models\Product;

class AppController extends Controller
{
    public function index()
    {
        $products = cache()->remember('todays-deals', 60*60*24, fn() => Product::getTodaysDeals());
        $product->setPriceToFloat();
        return view('index', compact('products'));
    }
}

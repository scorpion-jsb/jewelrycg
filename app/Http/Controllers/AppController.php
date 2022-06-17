<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $products = cache()->remember('todays-deals', 60*60*24, fn() => Product::getTodaysDeals());
        return view('index', compact('products'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $products = cache()->remember('index', 60, fn() => Product::with('images')->get());
        return view('index', compact('products'));
    }

    public function productPage(int $id_product)
    {
        $product = cache()->remember("product-$id_product", 60*10, fn() => Product::with('images')->find($id_product));
        if(! $product)
        {
            return response(status: 404);
        }

        return view('product_page', compact('product'));
    }
}

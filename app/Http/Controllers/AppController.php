<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        // $products = Product::factory()->count(20)->has(ProductImage::factory()->count(5), 'images')->create();
        $products = Product::with('images')->get();
        return view('index', compact('products'));
    }
}

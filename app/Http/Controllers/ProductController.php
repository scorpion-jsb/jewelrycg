<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchProductRequest;
use App\Models\Product;
use App\Models\Upload;
use App\Models\ProductsVariant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search(SearchProductRequest $req)
    {
        abort_if(! in_array($req->category, array_merge(Product::$category_list, ['All'])), 404);
        $products = Product::searchWithImages($req->q, $req->category);
        return view('products.search', compact('products'));
    }

    public function products_index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        $products->each(function($product){
            $product->setPriceToFloat();
        });
        return view('products.list', [
            'products' => $products
        ]);

    }

    public function show($slug)
    {
        $product = Product::with(['modelpreview'])->whereSlug($slug)->firstOrFail();
        abort_if(! $product, 404);
        $product->setPriceToFloat();
        $uploads = Upload::whereIn('id', explode(',',$product->product_images))->get(); 
        $variants = ProductsVariant::where('product_id', $product->id)->get();

        return view('products.show', compact('product', 'uploads', 'variants'));
    }

}

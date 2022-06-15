<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(ProductStoreRequest $req)
    {
        $product = Product::create($req->all());

        $images = collect($req->images);
        $images->transform(fn($i, $k) => [
            'path' => 'storage/'.$i->store($product->id)
        ]);
        
        $product->images()->createMany($images->toArray());

        return redirect()->route('products.show', $product->id);
    }

    public function show(int $id_product)
    {
        $product = cache()->remember("product-$id_product", 60*10, fn() => Product::with('images')->find($id_product));
        abort_if(! $product, 404);
        $product->setPriceToFloat();
        
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

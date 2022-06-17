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
        $data = $req->all();
        $data['price'] = Product::stringPriceToCents($req->price);
        $product = Product::create($data);
        $product->storeImages($req->images);

        return redirect()->route('products.show', $product->id);
    }

    public function show(int $id_product)
    {
        $product = Product::with('images')->find($id_product);
        abort_if(! $product, 404);
        $product->setPriceToFloat();

        $product_images_in_json = $product->images->map(fn($i) => asset($i->path))->toJson();

        return view('products.show', compact('product', 'product_images_in_json'));
    }

    public function edit(Product $product)
    {
        $product->setPriceToFloat();
        return view('products.edit', compact('product'));
    }

    public function update(ProductStoreRequest $req, Product $product)
    {
        $data = $req->all();
        $data['price'] = Product::stringPriceToCents($req->price);
        $product->update($data);
        $product->replaceImagesIfExist($req->images);

        cache()->forget('todays-deals');

        return redirect()->route('products.show', $product->id);
    }

    public function destroy(Product $product)
    {
        $product->deleteImagesInStorage();
        $product->delete();

        cache()->forget('todays-deals');

        return redirect()->route('index');
    }
}

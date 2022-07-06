<?php

namespace App\Http\Controllers;

//use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\SearchProductRequest;
use App\Models\Product;
use App\Models\Upload;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search(SearchProductRequest $req)
    {
        abort_if(! in_array($req->category, array_merge(Product::$category_list, ['All'])), 404);
        $products = Product::searchWithImages($req->q, $req->category);
        return view('products.search', compact('products'));
    }
/*
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
*/
    public function products_index()
    {
        /*
        $product = Product::all();
        $product->setPriceToFloat();
        return view('products.list', compact('product'));
*/
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
        $product = Product::with(['images' , 'modelpreview'])->whereSlug($slug)->firstOrFail();
        abort_if(! $product, 404);
        $product->setPriceToFloat();
        $uploads = Upload::whereIn('id', explode(',',$product->product_images))->get(); 
        $product_images_in_json = $product->images->map(fn($i) => asset($i->path))->toJson();

        return view('products.show', compact('product', 'product_images_in_json', 'uploads'));
    }
/*
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
    */
}

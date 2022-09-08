<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchProductRequest;
use App\Models\Product;
use App\Models\Upload;
use App\Models\UserSearch;
use App\Models\ProductsVariant;
use App\Models\ProductsCategorie;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    public function searchCategory(Request $req)
    {
        $products = Product::searchWithImages($req->q, $req->category);
        $categories = ProductsCategorie::whereNull('parent_id')->get();

        $attributes = Attribute::has('values')->select('id', 'name', 'type')->get();            
        return view('components.products-display', [
            'products'  => $products, 
            'categories'=>$categories, 
            'attrs'     => $attributes
        ]);
    }

    public function search(SearchProductRequest $req)
    {
        if (Auth::check()) {
            $search = new UserSearch;
            $search->user_id = Auth::user()->id;
            $search->query = json_encode(['category' => $req->category, 'query' => $req->q]);
            $search->save();
        }

        $products = Product::searchWithImages($req->q, $req->category);
        $categories = ProductsCategorie::whereNull('parent_id')->get();

        $attributes = Attribute::has('values')->select('id', 'name', 'type')->get();        
        return view('search', [
            'products'  => $products, 
            'categories'=>$categories, 
            'attrs'     => $attributes
        ]);
    }

    function index() {
        return redirect()->route('shop_index');
    }

    public function products_index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(24);
        $products->each(function($product){
            $product->setPriceToFloat();
        });

        $categories = ProductsCategorie::whereNull('parent_id')->get();

        $attributes = Attribute::has('values')->select('id', 'name', 'type')->get();
        return view('products.list', [
            'products'  => $products, 
            'categories'=> $categories, 
            'attrs'     => $attributes
        ]);

    }

    /**
     * Filter producst by category and attribute_values
     * 
     */
    public function filterProduct(Request $request){
        if( $request->attrs && count($request->attrs) && $request->categories && count($request->categories)){
            $attribute_query = '%'.implode(",", $request->attrs).'%';
            $products = Product::leftJoin('products_variants', 'products.id', '=', 'products_variants.product_id')
                        ->whereIn('category', $request->categories)
                        ->where(function($query) use($attribute_query){
                            $query->where('products.product_attribute_values', 'like', $attribute_query)
                            ->orWhere('products_variants.variant_attribute_value', 'like', $attribute_query);
                        })
                        ->orderBy('products.id', 'DESC')->paginate(24);
        }else if($request->categories && count($request->categories)){
            $products = Product::whereIn('category', $request->categories)
                        ->orderBy('id', 'DESC')->paginate(24);
        }else if($request->attrs && count($request->attrs)){
            $attribute_query = '%'.implode(",", $request->attrs).'%';
            $products = Product::leftJoin('products_variants', 'products.id', '=', 'products_variants.product_id')
                        ->where(function($query) use($attribute_query){
                            $query->where('products.product_attribute_values', 'like', $attribute_query)
                            ->orWhere('products_variants.variant_attribute_value', 'like', $attribute_query);
                        })
                        ->orderBy('products.id', 'DESC')->paginate(24);
        }else{
            $products = Product::orderBy('id', 'DESC')->paginate(24);            
        }
        $products->withPath('/3d-models');
        $categories = ProductsCategorie::whereNull('parent_id')->get();

        $attributes = Attribute::has('values')->select('id', 'name', 'type')->get();
        return view('components.products-display', [
            'products'  => $products,
            'categories'=>$categories,
            'attrs'     => $attributes
        ]);
    }
    public function show($slug)
    {
        try {
            $product = Product::with(['modelpreview'])->whereSlug($slug)->firstOrFail();
        } catch(ModelNotFoundException $e) {
            $product = Product::with(['modelpreview'])->whereId($slug)->firstOrFail();
        }
        abort_if(! $product, 404);

        $product->setPriceToFloat();
        $uploads = Upload::whereIn('id', explode(',',$product->product_images))->get(); 
        $variants = ProductsVariant::where('product_id', $product->id)->get();
        $maxPrice = ProductsVariant::where('product_id', $product->id)->max('variant_price') / 100;
        $minPrice = ProductsVariant::where('product_id', $product->id)->min('variant_price') / 100;
        return view('products.show', compact('product', 'uploads', 'variants', 'maxPrice', 'minPrice'));
    }

    public function download(Request $request)
    {
        if ($request->has('product_id')) {
            $product = Product::find($request->product_id);

            return response()->download(public_path('uploads/all/') . $product->digital->file_name, $product->getDigitalOriginalFileName());
        } else {
            $productVariant = ProductsVariant::find($request->variant_id);

            return response()->download(public_path('uploads/all/') . $productVariant->asset->file_name, $productVariant->getAssetOriginalFileName());
        }

    }
}

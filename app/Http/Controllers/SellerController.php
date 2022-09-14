<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Order;
use App\Models\Attribute;
use App\Models\ProductsCategorie;
use App\Models\ProductTag;
use App\Models\Product;
use App\Models\ProductsTaxOption;
use App\Models\ProductsVariant;
use App\Models\ProductTagsRelationship;
use App\Models\SellersProfile;
use App\Models\SellerWalletHistory;
use App\Models\SettingGeneral;
use Carbon\Carbon;

class SellerController extends Controller
{
    //
    public function dashboard(){

        $products = Product::where('vendor', auth()->id())->where('status', 2)->get();
        $seller = SellersProfile::where('user_id', auth()->id())->first();
        $pendingBalance = SellerWalletHistory::where('user_id', auth()->id())->where('status', 0)->select('amount')->get()->sum('amount');
        return view('seller.dashboard')->with([
            'products' => $products, 
            'seller'=>$seller, 
            'pendingBalance'=>$pendingBalance
        ]);        
    }
    /**
     * Show seller'sproduct create view
     */
    public function createProduct(){
        return view('seller.products.create',[
            'attributes' => Attribute::orderBy('id', 'DESC')->get(),
            'categories' => ProductsCategorie::all(),
            'tags' => ProductTag::all(),
            'taxes' => ProductsTaxOption::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProduct(ProductStoreRequest $req)
    {
        $tags = (array)$req->input('tags');
        $variants = (array)$req->input('variant');
        $attributes = implode(",",(array)$req->input('attributes'));
        $values = implode(",",(array)$req->input('values'));
        $data = $req->all();
        $data['vendor'] = auth()->id();
        $data['price'] = Product::stringPriceToCents($req->price);
        $data['is_digital'] = 1;
        $data['status'] = 2;
        $data['is_virtual'] = 0;
        $data['is_backorder'] = 0;
        $data['is_madetoorder'] = 0;
        $data['is_trackingquantity'] = 0;
        $data['product_attributes'] = $attributes;
        $data['product_attribute_values'] = $values;
        $data['slug'] = str_replace(" ","-", strtolower($req->name));

        $product = Product::create($data);
        $id_product = $product->id;

        foreach($variants as $variant)
        {
            $variant_data = $variant;
            $variant_data['product_id'] = $id_product;
            $variant_data['variant_price'] = Product::stringPriceToCents($variant_data['variant_price']);
            
            ProductsVariant::create($variant_data);
        }
        
        foreach( $tags as $tag )
        {
            $id_tag = (!is_numeric($tag)) ? $this->registerNewTag($tag) : $tag;
            ProductTagsRelationship::create([
                'id_tag' => $id_tag,
                'id_product' => $id_product,
             ]);
        }

        return redirect()->route('seller.dashboard');
    }    
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\SettingGeneral;
use App\Models\ProductsCategorie;
use App\Models\Attribute;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Intervention\Image\Facades\Image;
use Request;
use Illuminate\Support\Facades\Config;

use function PHPSTORM_META\type;

class AppController extends Controller
{
    public function index()
    {    
        //$products = cache()->remember('todays-deals', 60*60*24, fn() => Product::getTodaysDeals());
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->paginate(24);
        $products->each(function($product) {
            $product->setPriceToFloat();
        });
        $metaInfo = SettingGeneral::select('meta_title as metaTitle', 'meta_description as metaDescription')->first() ?? ['metaTitle'=> '', 'metaDescription'=> ''];
        $categories = ProductsCategorie::whereNull('parent_id')->get();

        $attrs = Attribute::has('values')->select('id', 'name', 'type')->get();        
        return view('index', compact('products', 'metaInfo', 'categories', 'attrs'));
    }

    function dashboard() {
        $carts = Cart::instance('default')->content();
        $orders = Order::where('user_id', Auth::user()->id)->withCount('items')->get();

        $orderCount = 0;
        foreach ($orders as $order) {
            $orderCount += $order->items_count;
        }

        $wishlists = Cart::instance('wishlist')->content();

        $purchases = Order::where('user_id', Auth::user()->id)->where('status_payment', 2)->with('items')->get();

        return view('dashboard')->with(['carts' => count($carts), 'orders' => $orderCount, 'wishlists' => count($wishlists), 'purchases' => $purchases]);
    }

    function image($filename) {
        $image = Image::make(public_path('/uploads/all/' . $filename));

        $width = 100;
        $height = 100;

        if (Request::has('width') && Request::get('width') != 0 && Request::has('height') && Request::get('height') != 0) 
            $image->fit(Request::get('width'), Request::get('height'));
        else if (Request::has('width') && Request::get('width') != 0 && (!Request::has('height') || Request::get('height') == 0))
            $image->resize(Request::get('width'), null, function ($constraint) {
                $constraint->aspectRatio();
            });
        else if (Request::has('height') && Request::get('height') != 0 && (!Request::has('width') || Request::get('width') == 0))
            $image->resize(null, Request::get('height'), function ($constraint) {
                $constraint->aspectRatio();
            });
        else
            $image->fit($width, $height);

        $array = explode(".", $filename);
        $filename = $array[0] . "-" . Request::get('width') . "-" . Request::get('height') . "." . $array[1];
        $image->save(public_path(Config::get('constants.file_upload_path') . "/" . $filename));

        return $image->response();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliverRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Attribute;
use App\Models\OrderServiceDelivery;
use App\Models\OrderServiceRequirement;
use App\Models\Product;
use App\Models\ProductsCategorie;
use App\Models\ProductsTaxOption;
use App\Models\ProductsVariant;
use App\Models\ProductTag;
use App\Models\ProductTagsRelationship;
use App\Models\SellersProfile;
use App\Models\SellersWalletHistory;
use App\Models\ServiceOrder;
use App\Models\ServiceTags;
use App\Models\Upload;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    //
    public function dashboard()
    {
        $pendingBalances = SellersWalletHistory::where('type', 'add')->where('status', 0)->get();
        foreach ($pendingBalances as $pending) {
            if (Carbon::now()->diffInDays($pending->created_at->startOfDay()) >= 14) {
                $wallet = SellersProfile::where('user_id', $pending->user_id)->first();
                if ($wallet) {
                    $wallet->wallet += $pending->amount;
                    $wallet->save();
                    $pending->status = 1;
                    $pending->save();
                }
            }
        }
        $products = Product::where('vendor', auth()->id())->get();
        $seller = SellersProfile::where('user_id', auth()->id())->firstOrFail();
        $pendingBalance = SellersWalletHistory::where('user_id', auth()->id())->where('status', 0)->select('amount')->get()->sum('amount');
        $totalEarned = SellersWalletHistory::where('user_id', auth()->id())->select('amount')->get()->sum('amount');
        return view('seller.dashboard')->with([
            'products' => $products,
            'seller' => $seller,
            'pendingBalance' => $pendingBalance,
            'totalEarned' => $totalEarned,
        ]);
    }
    /**
     * Show seller'sproduct create view
     */
    public function createProduct()
    {
        return view('seller.products.create', [
            'attributes' => Attribute::orderBy('id', 'DESC')->get(),
            'categories' => ProductsCategorie::all(),
            'tags' => ProductTag::all(),
            'taxes' => ProductsTaxOption::all(),
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
        $tags = (array) $req->input('tags');
        $variants = (array) $req->input('variant');
        $attributes = implode(",", (array) $req->input('attributes'));
        $values = implode(",", (array) $req->input('values'));
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
        $data['slug'] = str_replace(" ", "-", strtolower($req->name));
        $slug_count = Product::where('slug', $data['slug'])->count();
        if ($slug_count) {
            $data['slug'] = $data['slug'] . '-' . ($slug_count + 1);
        }
        $product = Product::create($data);
        $id_product = $product->id;

        foreach ($variants as $variant) {
            $variant_data = $variant;
            $variant_data['product_id'] = $id_product;
            $variant_data['variant_price'] = Product::stringPriceToCents($variant_data['variant_price']);

            ProductsVariant::create($variant_data);
        }

        foreach ($tags as $tag) {
            $id_tag = (!is_numeric($tag)) ? $this->registerNewTag($tag) : $tag;
            ProductTagsRelationship::create([
                'id_tag' => $id_tag,
                'id_product' => $id_product,
            ]);
        }

        return redirect()->route('seller.dashboard');
    }

    /**
     * Transaction History
     */
    public function transactionHistory()
    {
        $transactions = SellersWalletHistory::where('user_id', auth()->id())->orderBy('created_at', 'DESC')->get();
        return view('seller.history', ['transactions' => $transactions]);
    }

    private function registerNewTag($tag)
    {
        $last = ServiceTags::where('name', $tag)->first();

        if ($last) {
            return $last->id;
        }

        $servicetag = ServiceTags::create([
            'name' => $tag,
            'slug' => $this->slugify($tag),
        ]);
        return $servicetag->id;
    }

    public function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public function service_orders(Request $request)
    {
        $tab = $request->input("tab");
        if (!$tab) {
            $tab = "active";
        }

        $query = ServiceOrder::whereHas('service',
            fn($query) => $query->where('user_id', Auth::id())
        )->with(['user', 'service']);

        $current = Carbon::now();
        switch ($tab) {
            case "active":
                $query->where('status', '<', 3);
                break;
            case "late":
                $query->whereDate('original_delivery_time', '<', $current)->where('status', '<', 3);
                break;
            case "delivered":
                $query->where('status', 4);
                break;
            case "completed":
                $query->where('status', 5);
                break;
            case "canceled":
                $query->where('status', 3);
                break;
            default:
                break;
        }

        $orders = $query->get();

        return view('seller.services.orders.index', ['orders' => $orders, 'tab' => $tab]);
    }

    public function service_order_detail($id)
    {
        $order = ServiceOrder::where('order_id', $id)->withWhereHas('service',
            fn($query) => $query->where('user_id', Auth::id())
        )->with('user')->firstOrFail();

        $answers = OrderServiceRequirement::with('requirement')->where('order_id', $order->id)->get();

        $answers->each(function ($answer) {
            if ($answer->requirement->type == 1) {
                $attach_ids = explode(',', $answer->answer);
                $attaches = [];

                for ($i = 0; $i < count($attach_ids); $i++) {
                    $upload = Upload::findOrFail($attach_ids[$i]);
                    array_push($attaches, $upload);
                }

                $answer->attaches = $attaches;
            } else if ($answer->requirement->type == 3) {
                $answer->answers = explode(',', $answer->answer);
            }
        });

        $deliveries = OrderServiceDelivery::where('order_id', $order->id)->get();

        $deliveries->each(function ($delivery) {
            $attach_ids = explode(',', $delivery->attachment);
            $attaches = [];

            for ($i = 0; $i < count($attach_ids); $i++) {
                $upload = Upload::findOrFail($attach_ids[$i]);
                array_push($attaches, $upload);
            }

            $delivery->attaches = $attaches;
        });

        $buyer = User::with('uploads')->findOrFail($order->user_id);

        return view('seller.services.orders.detail', [
            'order' => $order,
            'answers' => $answers,
            'deliveries' => $deliveries,
            'buyer' => $buyer,
        ]);
    }

    public function service_order_deliver(DeliverRequest $request)
    {
        $order_id = $request->order_id;
        $message = $request->message;
        $attach = $request->attach;

        $order = ServiceOrder::findOrFail($order_id);
        $order->status = 4;
        $order->save();

        $delivery = new OrderServiceDelivery();
        $delivery->order_id = $order_id;
        $delivery->message = $message;
        $delivery->attachment = $attach;
        $delivery->save();

        return redirect()->back()->with("success", "Your service successfuly delivered!");
    }
}
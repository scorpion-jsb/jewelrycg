<?php

namespace App\Http\Controllers;

use App\Http\Requests\CancelCheckoutRequest;
use App\Http\Requests\PlaceOrderRequest;
use App\Http\Requests\StorePaymentIntentRequest;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductsVariant;
use App\Models\ShippingOption;
use App\Models\ProductsTaxOption;
use App\Models\User;
use App\Models\UserAddress;
use Auth;
use Error;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Stripe\Stripe;
use App\Mail\OrderPlacedMail;
use GeoIP;

use App\Models\SettingGeneral;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    // middleware
    public function __construct()
    {
        $setting = SettingGeneral::first();
        if($setting->guest_checkout != 1){
            $this->middleware(['checkout', 'verified']);
        }
    }
    public function index()
    {
        $products = Cart::instance('default')->content();

        $isIncludeShipping = false;

        foreach ($products as $product) {
            if (!$product->model->is_digital && !$product->model->is_virtual) {
                $isIncludeShipping = true;
            }
        }

        if ($isIncludeShipping) {
            return redirect()->route('checkout.shipping.get');
        }

        return redirect()->route('checkout.billing.get');
    }

    public function store(Request $request)
    {
        try
        {
            $this->validate($request, (new PlaceOrderRequest)->rules());

            $orderId = $request->session()->get('order_id', '');

            $order = Order::where('order_id', $orderId)->first();

            if (!$order) {
                $order = new Order;

                if ($request->buy_now_mode) {
                    Cart::instance('buy_now');
                } else {
                    Cart::instance('default');
                }

                $cartItems = Cart::content();
                $total = 0;

                foreach ($cartItems as $item) {
                    $orderItem = new OrderItem;

                    $orderItem->order_id = $orderId;
                    $orderItem->product_id = $item->id;
                    $orderItem->product_name = $item->model->name;
                    $orderItem->price = $item->price * 100;
                    $orderItem->quantity = $item->qty;
                    $orderItem->product_variant = 0;

                    $total = $orderItem->price * $orderItem->quantity;

                    if (isset($item->options['id'])) {
                        $orderItem->product_variant = $item->options['id'];

                        // $productVariant = ProductsVariant::find($item->options['id']);
                        $orderItem->product_variant_name = $item->options['name'];;
                    }

                    $orderItem->save();
                }

                // Save order subtotal
                $order->total = $total;

                // Find shipping price
                $shipping_option_id = $request->session()->get('shipping_option_id', 0);
                if ($shipping_option_id) {
                    $total += ShippingOption::find($shipping_option_id)->price;
                    $order->shipping_total = ShippingOption::find($shipping_option_id)->price;
                }

                $taxPrice = 0;
                foreach (Cart::content() as $product) {
                    $taxPrice += ($product->price * $product->qty * $product->model->taxPrice() / 100);
                }
                
                // Save tax 
                $order->tax_total = $taxPrice;

                // Save grand total
                $order->grand_total = $total+$taxPrice;
            }

            $order->order_id = $orderId;
            $order->status_payment = 1;
            if(auth()->user()){
                $order->user_id = auth()->id();
                // $order->first_name = auth()->user()->first_name;
                // $order->last_name = auth()->user()->last_name;
                $order->email = auth()->user()->email;
            }else{
                $order->user_id = 0;
                $order->email = $request->session()->get('billing_email');
            }
            $order->billing_first_name = $request->session()->get('billing_firstname');
            $order->billing_last_name = $request->session()->get('billing_lastname');
            $order->billing_address1 = $request->session()->get('billing_address1', '');
            $order->billing_address2 = $request->session()->get('billing_address2', '');
            $order->billing_city = $request->session()->get('billing_city', '');
            $order->billing_state = $request->session()->get('billing_state', '');
            $order->billing_zipcode = $request->session()->get('billing_zipcode', '');
            $order->billing_country = $request->session()->get('billing_country', '');
            $order->billing_phonenumber = $request->session()->get('billing_phonenumber', '');
            $order->shipping_first_name = $request->session()->get('shipping_firstname');
            $order->shipping_last_name = $request->session()->get('shipping_lastname');
            $order->shipping_address1 = $request->session()->get('shipping_address1', '');
            $order->shipping_address2 = $request->session()->get('shipping_address2', '');
            $order->shipping_city = $request->session()->get('shipping_city', '');
            $order->shipping_state = $request->session()->get('shipping_state', '');
            $order->shipping_zipcode = $request->session()->get('shipping_zipcode', '');
            $order->shipping_country = $request->session()->get('shipping_country', '');
            $order->shipping_phonenumber = $request->session()->get('shipping_phonenumber', '');
            $order->shipping_option_id = $request->session()->get('shipping_option_id', 0);
            $order->save();

            if(auth()->user()){
                Cart::erase(auth()->id());
            }else{
                Cart::erase($request->session()->get('order_id'));
            }

            Cart::destroy();
        } catch (Exception | Error $e) {
            return response(['ok' => false, 'error' => $e->getMessage()], 401);
        }

        return response(['ok' => true], 200);
    }

    public function createPaymentIntent(StorePaymentIntentRequest $req)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        header('Content-Type: application/json');

        if ($req->buy_now_mode) {
            Cart::instance('buy_now');
        } else {
            Cart::instance('default');
        }

        try {

            if(auth()->user()){
                $orderId = auth()->id() . strtoupper(uniqid());
                $username = auth()->user()->first_name . " " . auth()->user()->last_name;
            }else{
                $orderId = '0' . strtoupper(uniqid());
                $username = $req->session()->get('billing_firstname') . " " . $req->session()->get('billing_lastname');
            }
            $req->session()->put('order_id', $orderId);

            $description = env('APP_NAME') . ' Order#' . $orderId;

            $total = Cart::total(2, '.', '') * 100;
            $shipping_option_id = $req->session()->get('shipping_option_id', 0);

            if ($shipping_option_id)
                $total += ShippingOption::find($shipping_option_id)->price;

            $taxPrice = 0;
            foreach (Cart::content() as $product) {
                $taxPrice += ($product->price * $product->qty * $product->model->taxPrice() / 100);
            }

            $total += floor($taxPrice + 0.5);

            // Create a PaymentIntent with amount and currency

            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $total,
                'currency' => 'usd',
                'customer' => null,
                'description' => $description,
                'statement_descriptor' => substr($description, 0, 22),
                'shipping' => [
                    'address' => [
                        'city' => $req->session()->get('billing_city'),
                        'state' => $req->session()->get('billing_state'),
                        'country' => $req->session()->get('billing_country'),
                        'postal_code' => $req->session()->get('billing_zipcode'),
                        'line1' => $req->session()->get('billing_address1'),
                        'line2' => $req->session()->get('billing_address2'),
                    ],
                    'name' => $username,
                    'phone' => $req->session()->get('billing_phonenumber'),
                ],
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];

            return $output;
        } catch (Error $e) {
            http_response_code(500);
            return ['error' => $e->getMessage()];
        }
    }

    public function cancel(CancelCheckoutRequest $req)
    {
        $orderId = $req->session()->get('order_id');
        $error = $req->error;

        $order = Order::where('order_id',  $orderId)->first();

        if ($req->buy_now_mode) {
            Cart::instance('buy_now');
        } else {
            Cart::instance('default');
        }

        $order->restoreCartItems();
        if(auth()->user()){
            Cart::store(auth()->id());
        }else{
            Cart::store($req->session()->get('order_id'));
        }

        if ($error['type'] == 'validation_error') {
            Order::where('order_id', $orderId)->delete();
            OrderItem::where('order_id', $orderId)->delete();

            return response(null, 204);
        }


        $order->status_payment = 3;
        $order->payment_intent = $error['payment_intent']['id'];
        $order->status_payment_reason = $error['code'];
        $order->save();

        return response(null, 204);
    }

    public function paymentFinished(Request $request)
    {

        $orderId = $request->session()->get('order_id');

        $request->session()->forget('order_id');
        $request->session()->forget('shipping_price');
        $request->session()->forget('shipping_option_id');

        $order = Order::where('order_id', $orderId)->first();

        $order->status_payment = 2; // paid
        $order->payment_intent = $request->get('payment_intent');
        $order->save();
        // Send order placed email to customer
        if(auth()->user()){
            Mail::to(auth()->user()->email)->send(new OrderPlacedMail($order));
        }else{
            Mail::to($request->session()->get('billing_email'))->send(new OrderPlacedMail($order));
        }

        // redirect to order details
        return redirect()->route('orders.show', $orderId);
    }

    public function getShipping()
    {

        $countries = Country::all(['name', 'code']);
        $shippings = ShippingOption::all();
        $products = Cart::instance('default')->content();
        if(auth()->user()){
            $shipping_address = auth()->user()->address_shipping ?  UserAddress::find(auth()->user()->address_shipping) : "NULL";
        }else{
            $shipping_address = "NULL";
        }
        $user_ip = request()->ip();
        $location = geoip()->getLocation($user_ip);

        return view('checkout.shipping')->with(['countries' => $countries, 'shippings' => $shippings, 'products' => $products, 'locale' => 'checkout','shipping'=> $shipping_address, 'location'=> $location ]);
    }

    public function postShipping(Request $request)
    {
        // store data to session
        $request->session()->put('shipping_firstname', $request->first_name);
        $request->session()->put('shipping_lastname', $request->last_name);
        $request->session()->put('shipping_address1', $request->address1);
        $request->session()->put('shipping_address2', $request->address2);
        $request->session()->put('shipping_city', $request->city);
        $request->session()->put('shipping_state', $request->state);
        $request->session()->put('shipping_country', $request->country);
        $request->session()->put('shipping_zipcode', $request->pin_code);
        $request->session()->put('shipping_phonenumber', $request->phone);
        $request->session()->put('shipping_option_id', $request->shipping_option);
        $request->session()->put('shipping_price', ShippingOption::find($request->shipping_option)->price);
        if ($request->isRemember) {
            $userAddress = UserAddress::where('user_id', auth()->id())->first();

            if ($userAddress) {

                $userAddress = UserAddress::find($userAddress->id);
            } else {
                $userAddress = new UserAddress;
                $userAddressInfo = UserAddress::create([
                    'user_id' => auth()->id(),
                    'address' => $request->address1,
                    'address2' => $request->address2,
                    'city' => $request->city,
                    'state' => $request->state,
                    'country' => $request->country,
                    'postal_code' =>  $request->pin_code,
                    'phone' => $request->phone,
                ]);
    
                $user = User::where('id', auth()->id())->first();
                $user->address_shipping =  $userAddressInfo->id;
                $user->save();
            }

         
            $userAddress->address = $request->address1;
            $userAddress->address2 = $request->address2;
            $userAddress->city = $request->city;
            $userAddress->state = $request->state;
            $userAddress->country = $request->country;
            $userAddress->postal_code = $request->pin_code;
            $userAddress->phone = $request->phone;
            $userAddress->update();
        }
        
        return redirect()->route('checkout.billing.get');
    }

    public function getBilling()
    {
        $products = Cart::instance('default')->content();

        $isIncludeShipping = false;

        foreach ($products as $product) {
            if (!$product->model->is_digital && !$product->model->is_virtual) {
                $isIncludeShipping = true;
            }
        }

        $countries = Country::all(['name', 'code']);
        $products = Cart::instance('default')->content();
        if (auth()->user()) {
            $billing_address = auth()->user()->address_billing ?  UserAddress::find(auth()->user()->address_billing) : "NULL";
        }else{
            $billing_address = "NULL";
        }
        $user_ip = request()->ip();
        $location = geoip()->getLocation($user_ip);

        return view('checkout.billing')->with(['countries' => $countries, 'products' => $products, 'locale' => 'checkout', 'isIncludeShipping' => $isIncludeShipping, 'billing'=> $billing_address, 'location'=> $location]);
    }

    public function postBilling(Request $request)
    {
        $request->session()->put('billing_address1', $request->address1);
        $request->session()->put('billing_address2', $request->address2);
        $request->session()->put('billing_city', $request->city);
        $request->session()->put('billing_state', $request->state);
        $request->session()->put('billing_country', $request->country);
        $request->session()->put('billing_zipcode', $request->pin_code);
        $request->session()->put('billing_phonenumber', $request->phone);
        if (! auth()->user()) {
            $request->session()->put('billing_firstname', $request->first_name);
            $request->session()->put('billing_lastname', $request->last_name);
            $request->session()->put('billing_email', $request->email);
        }
        if ($request->isRemember && auth()->user()) {
            $userAddress = UserAddress::where('id', auth()->user()->address_billing)->first();
            if ($userAddress) {
                $userAddress = UserAddress::find($userAddress->id);
            } else {
                $userAddress = new UserAddress;
                $userAddress2Info = UserAddress::create([
                    'user_id' => auth()->id(),
                    'address' => $request->address1,
                    'address2' => $request->address2,
                    'city' => $request->city,
                    'state' => $request->state,
                    'country' => $request->country,
                    'postal_code' =>  $request->pin_code,
                    'phone' => $request->phone,
                ]);
                $user = User::where('id', auth()->id())->first();
                $user->address_billing =  $userAddress2Info->id;
                $user->save();
            }
          
            $userAddress->address = $request->address1;
            $userAddress->address2 = $request->address2;
            $userAddress->city = $request->city;
            $userAddress->state = $request->state;
            $userAddress->country = $request->country;
            $userAddress->postal_code = $request->pin_code;
            $userAddress->phone = $request->phone;

            $userAddress->update();
        }
          
        return redirect()->route('checkout.payment.get');
    }

    public function getPayment(Request $request)
    {
        $instance = isset($buy_now_mode) && $buy_now_mode == 1 ? 'buy_now' : 'default';

        $products = Cart::instance('default')->content();

        $isIncludeShipping = false;

        foreach ($products as $product) {
            if (!$product->model->is_digital && !$product->model->is_virtual) {
                $isIncludeShipping = true;
            }
        }

        $products = Cart::instance($instance)->content();
        return view('checkout.payment')->with(['products' => $products, 'locale' => 'checkout', 'isIncludeShipping' => $isIncludeShipping]);;
    }
}

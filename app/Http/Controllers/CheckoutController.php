<?php

namespace App\Http\Controllers;

use App\Http\Requests\CancelCheckoutRequest;
use App\Http\Requests\PlaceOrderRequest;
use App\Http\Requests\StorePaymentIntentRequest;
use App\Models\Order;
use App\Models\OrderItem;
use Error;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Auth;
use App\Models\UserAddress;

class CheckoutController extends Controller
{
    public function index()
    {
        $products = Cart::instance('default')->content();

        $isIncludeDigit = false;

        foreach ($products as $product) {
            if ($product->model->is_digital || $product->model->is_virtual) {
                $isIncludeDigit = true;
            }
        }

        if ($isIncludeDigit) {
            return redirect()->route('checkout.shipping.get');
        }

        return redirect()->route('checkout.billing.get');
    }

    public function store(Request $req)
    {
        try
        {
            $rules = (new PlaceOrderRequest)->rules();
            $this->validate($req, $rules);
            Order::changeCartInstanceIfBuyNowMode($req->buy_now_mode);

            $data = $req->all();
            $user = auth()->user();
            $user->update($data);

            $data['tracking_number'] = random_int(100000, 999999);
            $data['total_price'] = Order::getCartTotalInCents();
    
            $order = $user->orders()->create($data);
            $order->insertCartProducts();    
            Cart::erase(auth()->id());
            Cart::destroy();    
        }
        catch(Exception|Error $e)
        {
            return response(['ok' => false, 'error' => $e->getMessage()], 401);
        }

        return response(['ok' => true], 200);
    }

    public function createPaymentIntent(StorePaymentIntentRequest $req)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        header('Content-Type: application/json');

        Order::changeCartInstanceIfBuyNowMode($req->buy_now_mode);

        try {
            // Create a PaymentIntent with amount and currency
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => Order::getCartTotalInCents(),
                'currency' => 'usd',
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
        $order = auth()->user()->orders()->with('items', 'items.product:id,name,quantity')->orderBy('id', 'desc')->first();
        Order::changeCartInstanceIfBuyNowMode($req->buy_now_mode);
        $order->restoreCartItems();
        $order->restoreProductsQuantity();

        Cart::store(auth()->id());

        $order->delete();

        return response(null, 204);
    }

    public function paymentFinished()
    {
        $order = auth()->user()->orders()->orderBy('id', 'desc')->first();
        return redirect()->route('orders.show', $order->id);
    }

    public function postShipping(Request $request)
    {
        $order = new Order;

        $order->shipping_address1 = $request->address1;
        $order->shipping_address2 = $request->address2;
        $order->shipping_city = $request->city;
        $order->shipping_state = $request->state;
        $order->shipping_country = $request->country;
        $order->shipping_zipcode = $request->pin_code;
        $order->shipping_phonenumber = $request->phone;
        $order->user_id = Auth::user()->id;

        if ($request->isRemember) {
            $userAddress = UserAddress::where('user_id', Auth::user()->id)->first();

            if ($userAddress) {
                $userAddress = UserAddress::find($userAddress);
            } else {
                $userAddress = new UserAddress;
            }

            $userAddress->address = $request->address1;
            $userAddress->address2 = $request->address2;
            $userAddress->city = $request->city;
            $userAddress->state = $request->state;
            $userAddress->country = $request->country;
            $userAddress->postal_code = $request->pin_code;
            $userAddress->save();
        }

        $orderId = 0;

        if ($order->save()) {
            $products = Cart::instance('default')->content();
            $orderId = $order->id;

            foreach ($products as $product) {
                $orderItem = new OrderItem;

                $orderItem->order_id = $orderId;
                $orderItem->product_id = $product->id;
                $orderItem->quantity = $product->qty;
                $orderItem->product_variant = $product->options->id;
                $orderItem->price = $product->options->price;
                $orderItem->save();
            }
        }

        return redirect()->route('checkout.billing.get', ['orderId' => $orderId]);
    }

    public function getShipping() {
        return view('checkout.shipping');
    }

    public function getBilling($orderId = 0)
    {
        return view('checkout.billing')->with(['orderId' => $orderId]);
    }

    public function postBilling(Request $request)
    {
        $order = null;

        if ($request->orderId)
            $order = Order::find($request->orderId);
        else
            $order = new Order;

        $order->billing_address1 = $request->address1;
        $order->billing_address2 = $request->address2;
        $order->billing_city = $request->city;
        $order->billing_state = $request->state;
        $order->billing_country = $request->country;
        $order->billing_zipcode = $request->pin_code;
        $order->billing_phonenumber = $request->phone;
        $order->user_id = Auth::user()->id;
        $order->save();

        if ($order->save() && !$request->orderId) {
            $products = Cart::instance('default')->content();
            $orderId = $order->id;

            foreach ($products as $product) {
                $orderItem = new OrderItem;

                $orderItem->order_id = $orderId;
                $orderItem->product_id = $product->id;
                $orderItem->quantity = $product->qty;
                $orderItem->product_variant = $product->options->id;
                $orderItem->price = $product->options->price;
                $orderItem->save();
            }
        }

        if ($request->isRemember) {
            $userAddress = UserAddress::where('user_id', Auth::user()->id)->first();

            if ($userAddress) {
                $userAddress = UserAddress::find($userAddress->id);
            } else {
                $userAddress = new UserAddress;
            }
  
            $userAddress->user_id = Auth::user()->id;
            $userAddress->address = $request->address1;
            $userAddress->address2 = $request->address2;
            $userAddress->city = $request->city;
            $userAddress->state = $request->state;
            $userAddress->country = $request->country;
            $userAddress->postal_code = $request->pin_code;
            $userAddress->save();
        }

        return redirect()->route('checkout.payment.get');
   }

   public function getPayment(Request $request) 
   {
        return view('checkout.payment');
   }
}
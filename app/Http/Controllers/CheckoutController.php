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

    public function store(Request $request)
    {
        try
        {
            $this->validate($request, (new PlaceOrderRequest)->rules());

            $order = new Order;

            $orderId = Auth::user()->id . $request->session()->get('order_id');

            $order->id = $request->session()->get('order_id');
            $order->order_id = $orderId;
            $order->user_id = Auth::user()->id;
            $order->billing_address1 = $request->session()->get('billing_address1', '');
            $order->billing_address2 = $request->session()->get('billing_address2', '');
            $order->billing_city = $request->session()->get('billing_city', '');
            $order->billing_state = $request->session()->get('billing_state', '');
            $order->billing_zipcode = $request->session()->get('billing_zipcode', '');
            $order->billing_country = $request->session()->get('billing_country', '');
            $order->billing_phonenumber = $request->session()->get('billing_phonenumber', '');
            $order->shipping_address1 = $request->session()->get('shipping_address1', '');
            $order->shipping_address2 = $request->session()->get('shipping_address2', '');
            $order->shipping_city = $request->session()->get('shipping_city', '');
            $order->shipping_state = $request->session()->get('shipping_state', '');
            $order->shipping_zipcode = $request->session()->get('shipping_zipcode', '');
            $order->shipping_country = $request->session()->get('shipping_country', '');
            $order->shipping_phonenumber = $request->session()->get('shipping_phonenumber', '');
            $order->save();

            if($request->buy_now_mode)
            {
                Cart::instance('buy_now');
            }
            else
            {
                Cart::instance('default');
            }

            $cartItems = Cart::content();

            foreach ($cartItems as $item) {
                $orderItem = new OrderItem;

                $orderItem->order_id = $orderId;
                $orderItem->product_id = $item->id;
                $orderItem->price = $item->price * 100;
                $orderItem->quantity = $item->qty;

                $orderItem->product_variant = 0;

                if (isset($item->options['id']))
                    $orderItem->product_variant = $item->options['id'];


                $orderItem->save();
            }
            
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

        if($req->buy_now_mode)
        {
            Cart::instance('buy_now');
        }
        else
        {
            Cart::instance('default');
        }

        try {
            // Create a PaymentIntent with amount and currency
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => Cart::total(2, '.', '') * 100,
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

        if($req->buy_now_mode)
        {
            Cart::instance('buy_now');
        }
        else
        {
            Cart::instance('default');
        }

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

    public function getShipping() {
        return view('checkout.shipping');
    }

    public function postShipping(Request $request)
    {
        // store data to session
        $request->session()->put('shipping_address1', $request->address1);
        $request->session()->put('shipping_address2', $request->address2);
        $request->session()->put('shipping_city', $request->city);
        $request->session()->put('shipping_state', $request->state);
        $request->session()->put('shipping_country', $request->country);
        $request->session()->put('shipping_zipcode', $request->pin_code);
        $request->session()->put('shipping_phonenumber', $request->phone);

        if ($request->isRemember) {
            $userAddress = UserAddress::where('user_id', Auth::user()->id)->first();

            if ($userAddress) {
                $userAddress = UserAddress::find($userAddress->id);
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

        return redirect()->route('checkout.billing.get');
    }

    public function getBilling()
    {
        return view('checkout.billing');
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
        $orderId = strtoupper(uniqid());
        $request->session()->put('order_id', $orderId);

        return view('checkout.payment')->with(['orderId' => $orderId]);
   }
}

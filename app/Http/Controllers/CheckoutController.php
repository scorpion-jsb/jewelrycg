<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceOrderRequest;
use App\Models\Order;
use Error;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function store(Request $req)
    {
        try
        {
            $rules = (new PlaceOrderRequest)->rules();
            $this->validate($req, $rules);

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

    public function createPaymentIntent()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        header('Content-Type: application/json');

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

    public function cancel()
    {
        $order = auth()->user()->orders()->with('items', 'items.product:id,name,qty')->orderBy('id', 'desc')->first();
        $order->restoreCartItems();
        $order->restoreProductsQty();

        Cart::store(auth()->id());

        $order->delete();

        return response(null, 204);
    }

    public function paymentFinished()
    {
        return view('payment_finished');
    }
}

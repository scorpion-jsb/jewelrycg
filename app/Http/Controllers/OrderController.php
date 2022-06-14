<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->withCount('items')->orderBy('id', 'desc')->paginate(10);
        $orders->transform(fn($i, $k) => $i->formatPrice());
        return view('orders.index', compact('orders'));
    }

    public function show($id_order)
    {
        $order = Order::with('items', 'items.product:id,name')->find($id_order);
        $this->authorize('show', $order);
        $order->formatPrice();
        $order->items->transform(function($i, $k) {
            $i->getSelfWithProductInfo();  
            return $i->setPriceToFloat();
        });

        return view('orders.show', compact('order'));
    }
}

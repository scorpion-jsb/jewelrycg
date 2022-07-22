<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::getBasedOnUser();
        $orders->transform(fn($i) => $i->formatPrice());
        return view('orders.index', compact('orders'));
    }

    public function show(int $orderId)
    {
        $edit = (bool) request()->query('edit', 0);
        $order = Order::with('items', 'items.product:id,name,slug')->find($orderId);
        $this->authorize('show', $order);
        $order->formatPrice();
        $order->items->transform(function($i) {
            $i->getSelfWithProductInfo();  
            return $i->setPriceToFloat();
        });

        return view('orders.show', compact('order', 'edit'));
    }

    public function update(UpdateOrderRequest $req, Order $order)
    {
        $this->authorize('edit', $order);

        $order->adminUpdate($req);

        return redirect()->route('orders.show', $order);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items.product')->latest()->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function approve(Order $order)
    {
        $order->update([
            'status' => 'approved',
        ]);

        return to_route('admin.orders.index')->with('success', 'Sipariş onaylandı.');
    }

    public function nextStatus(Order $order)
    {
        $statuses = [
            'approved',
            'preparing',
            'packed',
            'shipped',
            'on_the_way',
            'delivered',
        ];

        $currentIndex = array_search($order->status, $statuses);

        if ($currentIndex !== false && $currentIndex < count($statuses) - 1) {
            $order->update([
                'status' => $statuses[$currentIndex + 1],
            ]);
        }

        return to_route('admin.orders.index')->with('success', 'Sipariş durumu ilerletildi.');
    }
}

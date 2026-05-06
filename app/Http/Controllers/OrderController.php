<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $userId = Auth::id();

        $cart = Cart::where('user_id', $userId)->first();

        if (!$cart || $cart->items()->count() === 0) {
            return to_route('cart.index')->with('success', 'Sepetiniz boş.');
        }

        $items = $cart->items()->with('product')->get();

        return view('orders.checkout', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:500',
        ]);

        $userId = Auth::id();

        $cart = Cart::where('user_id', $userId)->first();
        $items = $cart->items()->with('product')->get();

        $total = 0;

        foreach ($items as $item) {
            $total += $item->quantity * $item->product->price;
        }

        $order = Order::create([
            'user_id' => $userId,
            'total_price' => $total,
            'status' => 'pending',
            'shipping_address' => $request->shipping_address,
        ]);

        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        $cart->items()->delete();

        return to_route('orders.index')->with('success', 'Siparişiniz başarıyla oluşturuldu.');
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();

        return view('orders.index', compact('orders'));
    }
}

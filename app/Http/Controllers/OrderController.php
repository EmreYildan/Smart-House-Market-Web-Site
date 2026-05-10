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
            'card_name' => 'required|string|max:255',
            'card_number' => 'required|string|min:16|max:19',
            'card_expiry' => 'required|string|max:5',
            'card_cvv' => 'required|string|min:3|max:3',
        ]);

        $userId = Auth::id();

        $cart = Cart::where('user_id', $userId)->first();
        $items = $cart->items()->with('product')->get();

        $total = 0;

        foreach ($items as $item) {
            if ($item->product->stock < $item->quantity) {
                return to_route('cart.index')->with('success', $item->product->name . ' için yeterli stok yok.');
            }

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

            $item->product->decrement('stock', $item->quantity);
        }

        $cart->items()->delete();

        return to_route('orders.index')->with('success', 'Ödeme başarılı. Siparişiniz oluşturuldu.');    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();

        return view('orders.index', compact('orders'));
    }

    public function cancel(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if ($order->status !== 'pending') {
            return back()->with('success', 'Bu sipariş artık iptal edilemez.');
        }

        $order->update([
            'status' => 'cancelled',
        ]);

        $user = Auth::user();
        $user->increment('balance', $order->total_price);

        foreach ($order->items as $item) {
            $item->product->increment('stock', $item->quantity);
        }

        return back()->with('success', 'Sipariş iptal edildi. Tutar bakiyenize aktarıldı.');
    }

        public function received(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if ($order->status !== 'delivered') {
            return back()->with('success', 'Bu sipariş henüz teslim alınamaz.');
        }

        $order->update([
            'status' => 'received',
        ]);

        return back()->with('success', 'Sipariş teslim alındı olarak işaretlendi.');
    }
}

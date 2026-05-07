<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
        ]);

        $items = $cart->items()->with('product')->get();

        return view('cart.index', compact('cart', 'items'));
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $quantity = (int) $request->quantity;

        if ($product->stock < $quantity) {
            return back()->with('success', 'Yeterli stok yok. Mevcut stok: ' . $product->stock);
        }

        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
        ]);

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($item) {
            if ($product->stock < ($item->quantity + $quantity)) {
                return back()->with('success', 'Sepetteki adetle birlikte stok yetersiz. Mevcut stok: ' . $product->stock);
            }

            $item->increment('quantity', $quantity);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }

        return to_route('cart.index')->with('success', 'Ürün sepete eklendi.');
    }
    public function remove(CartItem $item)
    {
        $item->delete();

        return to_route('cart.index')->with('success', 'Ürün sepetten çıkarıldı.');
    }
}

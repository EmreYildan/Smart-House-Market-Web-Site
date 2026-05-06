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

    public function add(Product $product)
    {
        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
        ]);

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
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

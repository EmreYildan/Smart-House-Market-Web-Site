<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
       $product->load([
            'category',
            'reviews.user'
        ]);

        $product->setRelation(
            'reviews',
            $product->reviews()->with('user')->latest()->take(10)->get()
        );

        return view('products.show', compact('product'));
    }


}

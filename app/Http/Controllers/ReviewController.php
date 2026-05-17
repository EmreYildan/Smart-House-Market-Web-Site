<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $badWords = [
            'salak',
            'aptal',
            'gerizekali',
            'gerizekalı',
            'mal',
            'enayi',
            'hakaret',
            'argo',
            'kufur',
            'küfür',
            'nefret',
            'ırkçı',
            'irkci',
            'tehdit',
            'spam',
            'dolandırıcı',
            'dolandirici',
        ];

        $comment = mb_strtolower($request->comment ?? '');

        foreach ($badWords as $word) {
            if (str_contains($comment, mb_strtolower($word))) {
                return back()->withErrors([
                    'comment' => 'Yorumunuz uygunsuz kelime içeriyor.',
                ]);
            }
        }

        $review = Review::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        $imagePath = $review?->image;

        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            $imagePath = $request->file('image')->store('reviews', 'public');
        }

        Review::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $product->id,
            ],
            [
                'rating' => $request->rating,
                'comment' => $request->comment,
                'image' => $imagePath,
            ]
        );

        return back()->with('success', 'Yorumunuz kaydedildi.');
    }

}

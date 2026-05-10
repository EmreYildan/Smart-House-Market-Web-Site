<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $comments = [
            'Ürün gerçekten çok kaliteli.',
            'Beklediğimden daha iyi çıktı.',
            'Kargo hızlıydı ve ürün sağlam geldi.',
            'Fiyat performans açısından başarılı.',
            'Kurulumu çok kolay.',
            'Bir süredir kullanıyorum memnunum.',
            'Tasarımı çok hoşuma gitti.',
            'Kesinlikle tavsiye ederim.',
            'Beklentimi karşıladı.',
            'Malzeme kalitesi güzel.',
        ];

        $users = User::where('role', 'user')->get();
        $products = Product::all();

        foreach ($products as $product) {

            $randomUsers = $users->random(min(5, $users->count()));

            foreach ($randomUsers as $user) {

                Review::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'product_id' => $product->id,
                    ],
                    [
                        'rating' => rand(3, 5),
                        'comment' => $comments[array_rand($comments)],
                    ]
                );

            }
        }
    }
}

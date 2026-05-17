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
            'Ürün gerçekten çok kaliteli, kurulumu da oldukça kolaydı.',
            'Beklediğimden daha iyi çıktı, fiyatına göre başarılı.',
            'Kargo hızlıydı ve ürün sağlam şekilde teslim edildi.',
            'Fiyat performans açısından gayet mantıklı bir ürün.',
            'Mobil uygulama ile kontrol etmesi çok pratik.',
            'Bir süredir kullanıyorum, şu ana kadar memnunum.',
            'Tasarımı modern ve ev ortamına güzel uyum sağlıyor.',
            'Akıllı ev sistemi kurmak isteyenlere tavsiye ederim.',
            'Ürün beklentimi karşıladı, kullanım deneyimi iyi.',
            'Malzeme kalitesi güzel, paketleme de başarılıydı.',
            'Günlük kullanımda ciddi kolaylık sağlıyor.',
            'Özellikle otomasyon özelliği çok işime yaradı.',
            'Kurulumdan sonra sorunsuz çalıştı.',
            'Uygulama üzerinden kontrol etmek oldukça rahat.',
            'Benzer ürünlere göre daha kullanışlı buldum.',
            'Ev güvenliği açısından güzel bir katkı sağladı.',
            'Enerji tasarrufu konusunda faydasını gördüm.',
            'Akıllı ev sistemime kolayca entegre ettim.',
            'Ürün açıklamada anlatıldığı gibi geldi.',
            'Genel olarak başarılı ve tavsiye edilebilir.',
        ];

        $categoryComments = [
            'Aydınlatma' => [
                'Işık kalitesi güzel, renk seçenekleri başarılı.',
                'Akşamları ortamı çok daha modern gösteriyor.',
                'Uygulama üzerinden ışığı kontrol etmek çok pratik.',
            ],
            'Güvenlik' => [
                'Ev güvenliği için oldukça kullanışlı bir ürün.',
                'Bildirim sistemi hızlı çalışıyor.',
                'Kamera ve güvenlik özellikleri beklentimi karşıladı.',
            ],
            'Enerji Yönetimi' => [
                'Elektrik tüketimini takip etmek çok faydalı oldu.',
                'Enerji tasarrufu açısından güzel bir çözüm.',
                'Uzaktan açıp kapatma özelliği çok işlevsel.',
            ],
            'Temizlik' => [
                'Temizlik işini ciddi şekilde kolaylaştırdı.',
                'Günlük kullanımda zamandan tasarruf sağlıyor.',
                'Otomatik çalışma özelliği gayet başarılı.',
            ],
            'İklimlendirme' => [
                'Sıcaklık kontrolü oldukça başarılı.',
                'Soğuk havalarda evi daha konforlu hale getiriyor.',
                'Kombi ve klima kontrolünde çok pratik.',
            ],
            'Sensörler' => [
                'Algılama hassasiyeti başarılı.',
                'Bildirimleri hızlı gönderiyor.',
                'Ev otomasyonu için çok faydalı bir sensör.',
            ],
            'Ev Otomasyonu' => [
                'Akıllı ev sistemini yönetmek çok kolaylaştı.',
                'Senaryo oluşturma özelliği oldukça kullanışlı.',
                'Diğer cihazlarla uyumu güzel.',
            ],
        ];

        $users = User::where('role', 'user')->get();
        $products = Product::with('category')->get();

        if ($users->count() === 0 || $products->count() === 0) {
            return;
        }

        foreach ($products as $product) {
            $reviewCount = min(rand(3, 5), $users->count());
            $randomUsers = $users->random($reviewCount);

            foreach ($randomUsers as $user) {
                $categoryName = $product->category?->name;

                $commentPool = $comments;

                if ($categoryName && isset($categoryComments[$categoryName])) {
                    $commentPool = array_merge($commentPool, $categoryComments[$categoryName]);
                }

                Review::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'product_id' => $product->id,
                    ],
                    [
                        'rating' => rand(3, 5),
                        'comment' => $commentPool[array_rand($commentPool)],
                        'image' => null,
                    ]
                );
            }
        }
    }
}

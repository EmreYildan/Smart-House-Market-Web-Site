<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['Akıllı Ampul', 'Mobil uygulama ile kontrol edilebilen Wi-Fi akıllı ampul.', 299.90, 50],
            ['Akıllı Priz', 'Uzaktan açma kapama ve enerji takibi özellikli akıllı priz.', 399.90, 40],
            ['Güvenlik Kamerası', 'Gece görüşlü, hareket algılamalı ev güvenlik kamerası.', 1299.90, 25],
            ['Akıllı Kapı Kilidi', 'Şifre, kart ve mobil uygulama destekli kapı kilidi.', 2499.90, 15],
            ['Hareket Sensörü', 'Ev içi hareket algılama sensörü.', 349.90, 60],
            ['Akıllı Termostat', 'Isı kontrolü sağlayan programlanabilir termostat.', 1799.90, 20],
            ['Robot Süpürge', 'Haritalama özellikli akıllı robot süpürge.', 8999.90, 10],
            ['Akıllı Zil', 'Kameralı ve mobil bildirim destekli kapı zili.', 1499.90, 18],
            ['Wi-Fi Röle', 'Elektrikli cihazları uzaktan kontrol etmeyi sağlar.', 249.90, 70],
            ['Akıllı Perde Motoru', 'Perdelerinizi otomatik açıp kapatmanızı sağlar.', 1999.90, 12],
            ['Akıllı Duman Dedektörü', 'Duman algıladığında mobil bildirim gönderir.', 599.90, 30],
            ['Akıllı Su Kaçağı Sensörü', 'Su sızıntılarını erken algılar.', 449.90, 35],
            ['Akıllı Klima Kumandası', 'Klimayı mobil uygulama ile yönetir.', 799.90, 28],
            ['Akıllı LED Şerit', 'RGB renk seçenekli akıllı LED şerit.', 499.90, 45],
            ['Akıllı Hoparlör', 'Sesli komut destekli ev asistanı.', 2299.90, 14],
            ['Akıllı Kamera Hub', 'Birden fazla güvenlik kamerasını yönetir.', 999.90, 22],
            ['Akıllı Garaj Kapısı Modülü', 'Garaj kapısını uzaktan kontrol eder.', 1199.90, 16],
            ['Akıllı Anahtar', 'Işıkları mobil uygulama ile kontrol eder.', 699.90, 38],
            ['Akıllı Hava Kalitesi Sensörü', 'Sıcaklık, nem ve hava kalitesini ölçer.', 899.90, 26],
            ['Akıllı Ev Kontrol Paneli', 'Tüm akıllı cihazları tek ekrandan yönetir.', 3499.90, 8],
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product[0],
                'description' => $product[1],
                'price' => $product[2],
                'stock' => $product[3],
                'image' => null,
                'is_active' => true,
            ]);
        }
    }
}

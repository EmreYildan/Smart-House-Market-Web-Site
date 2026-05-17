<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Aydınlatma
            ['Akıllı Ampul', 'Mobil uygulama ile kontrol edilebilen Wi-Fi akıllı ampul.', 299.90, 50, 'Aydınlatma'],
            ['RGB Akıllı LED Şerit', 'Renk değiştirebilen uygulama kontrollü LED şerit.', 499.90, 45, 'Aydınlatma'],
            ['Akıllı Tavan Lambası', 'Sesli komut destekli modern tavan aydınlatması.', 899.90, 25, 'Aydınlatma'],
            ['Hareket Algılamalı Gece Lambası', 'Gece otomatik yanan hareket sensörlü lamba.', 249.90, 60, 'Aydınlatma'],
            ['Akıllı Masa Lambası', 'Parlaklık ve renk sıcaklığı ayarlanabilir masa lambası.', 699.90, 30, 'Aydınlatma'],
            ['Wi-Fi Bahçe Aydınlatması', 'Dış mekan için uzaktan kontrol edilebilir aydınlatma.', 1199.90, 18, 'Aydınlatma'],
            ['Akıllı Spot Lamba', 'Salon ve vitrin için yönlendirilebilir akıllı spot lamba.', 549.90, 35, 'Aydınlatma'],

            // Güvenlik
            ['Güvenlik Kamerası', 'Gece görüşlü, hareket algılamalı ev güvenlik kamerası.', 1299.90, 25, 'Güvenlik'],
            ['Dış Mekan Güvenlik Kamerası', 'Yağmur ve rüzgara dayanıklı dış mekan kamerası.', 1899.90, 20, 'Güvenlik'],
            ['Akıllı Kapı Kilidi', 'Şifre, kart ve mobil uygulama destekli kapı kilidi.', 2499.90, 15, 'Güvenlik'],
            ['Akıllı Zil', 'Kameralı ve mobil bildirim destekli kapı zili.', 1499.90, 18, 'Güvenlik'],
            ['Akıllı Alarm Sistemi', 'Kapı, pencere ve hareket algılama destekli alarm seti.', 2199.90, 12, 'Güvenlik'],
            ['Pencere Güvenlik Sensörü', 'Pencere açıldığında mobil bildirim gönderen sensör.', 349.90, 40, 'Güvenlik'],
            ['Akıllı Kamera Hub', 'Birden fazla güvenlik kamerasını tek merkezden yönetir.', 999.90, 22, 'Güvenlik'],

            // Enerji Yönetimi
            ['Akıllı Priz', 'Uzaktan açma kapama ve enerji takibi özellikli akıllı priz.', 399.90, 40, 'Enerji Yönetimi'],
            ['Enerji Ölçer Akıllı Priz', 'Elektrik tüketimini anlık olarak ölçen akıllı priz.', 549.90, 35, 'Enerji Yönetimi'],
            ['Wi-Fi Röle', 'Elektrikli cihazları uzaktan kontrol etmeyi sağlar.', 249.90, 70, 'Enerji Yönetimi'],
            ['Akıllı Anahtar', 'Işıkları mobil uygulama ile kontrol eder.', 699.90, 38, 'Enerji Yönetimi'],
            ['Akıllı Sigorta Modülü', 'Ev elektrik hattını uzaktan takip etmeyi sağlar.', 1599.90, 10, 'Enerji Yönetimi'],
            ['Güneş Enerjisi Takip Modülü', 'Ev tipi güneş enerji sistemlerini izler.', 2299.90, 8, 'Enerji Yönetimi'],

            // Temizlik
            ['Robot Süpürge', 'Haritalama özellikli akıllı robot süpürge.', 8999.90, 10, 'Temizlik'],
            ['Akıllı Mop Robotu', 'Islak temizlik yapabilen otomatik mop robotu.', 6999.90, 12, 'Temizlik'],
            ['Akıllı Çöp Kutusu', 'Sensörlü kapağa sahip hijyenik çöp kutusu.', 799.90, 25, 'Temizlik'],
            ['Robot Süpürge Toz İstasyonu', 'Robot süpürge için otomatik boşaltma ünitesi.', 3499.90, 9, 'Temizlik'],
            ['Akıllı Cam Temizleme Robotu', 'Cam yüzeyleri otomatik temizleyen robot cihaz.', 4999.90, 7, 'Temizlik'],

            // İklimlendirme
            ['Akıllı Termostat', 'Isı kontrolü sağlayan programlanabilir termostat.', 1799.90, 20, 'İklimlendirme'],
            ['Akıllı Klima Kumandası', 'Klimayı mobil uygulama ile yönetir.', 799.90, 28, 'İklimlendirme'],
            ['Akıllı Isıtıcı Kontrol Modülü', 'Elektrikli ısıtıcıları uzaktan kontrol eder.', 899.90, 22, 'İklimlendirme'],
            ['Akıllı Kombi Kontrol Cihazı', 'Kombi sıcaklığını mobil uygulama ile ayarlar.', 1999.90, 18, 'İklimlendirme'],
            ['Akıllı Nemlendirici', 'Oda nem seviyesini otomatik dengeler.', 1499.90, 16, 'İklimlendirme'],
            ['Akıllı Hava Temizleyici', 'Hava kalitesine göre otomatik çalışan temizleyici.', 3299.90, 14, 'İklimlendirme'],
            ['Sıcaklık Kontrollü Akıllı Vana', 'Petek sıcaklığını oda bazlı kontrol eder.', 1199.90, 24, 'İklimlendirme'],

            // Sensörler
            ['Hareket Sensörü', 'Ev içi hareket algılama sensörü.', 349.90, 60, 'Sensörler'],
            ['Akıllı Duman Dedektörü', 'Duman algıladığında mobil bildirim gönderir.', 599.90, 30, 'Sensörler'],
            ['Akıllı Su Kaçağı Sensörü', 'Su sızıntılarını erken algılar.', 449.90, 35, 'Sensörler'],
            ['Akıllı Hava Kalitesi Sensörü', 'Sıcaklık, nem ve hava kalitesini ölçer.', 899.90, 26, 'Sensörler'],
            ['Kapı Pencere Sensörü', 'Kapı veya pencere açılınca bildirim gönderir.', 299.90, 55, 'Sensörler'],
            ['Akıllı Gaz Kaçağı Sensörü', 'Gaz sızıntısı algıladığında alarm verir.', 799.90, 20, 'Sensörler'],
            ['Yağmur Sensörü', 'Dış mekanda yağmur algılayıp otomasyon tetikler.', 649.90, 18, 'Sensörler'],

            // Ev Otomasyonu
            ['Akıllı Ev Kontrol Paneli', 'Tüm akıllı cihazları tek ekrandan yönetir.', 3499.90, 8, 'Ev Otomasyonu'],
            ['Akıllı Perde Motoru', 'Perdelerinizi otomatik açıp kapatmanızı sağlar.', 1999.90, 12, 'Ev Otomasyonu'],
            ['Akıllı Garaj Kapısı Modülü', 'Garaj kapısını uzaktan kontrol eder.', 1199.90, 16, 'Ev Otomasyonu'],
            ['Akıllı Hoparlör', 'Sesli komut destekli ev asistanı.', 2299.90, 14, 'Ev Otomasyonu'],
            ['Akıllı Ev Hub', 'Tüm akıllı cihazları merkezi olarak bağlar.', 1799.90, 20, 'Ev Otomasyonu'],
            ['Akıllı Senaryo Butonu', 'Tek tuşla ev otomasyonu senaryoları çalıştırır.', 399.90, 42, 'Ev Otomasyonu'],
            ['Akıllı Sulama Sistemi', 'Bahçe sulamasını hava durumuna göre ayarlar.', 2499.90, 10, 'Ev Otomasyonu'],
            ['Akıllı Ev Uzaktan Kumanda', 'TV, klima ve cihazları tek kumandadan yönetir.', 899.90, 33, 'Ev Otomasyonu'],
            ['Akıllı Kapı Otomasyon Modülü', 'Kapı açma kapama işlemlerini otomatikleştirir.', 1399.90, 15, 'Ev Otomasyonu'],
            ['Akıllı Ev Başlangıç Seti', 'Yeni başlayanlar için hub, priz ve sensör seti.', 2999.90, 11, 'Ev Otomasyonu'],
        ];

        foreach ($products as $product) {
            $category = Category::firstOrCreate([
                'name' => $product[4],
            ]);

            Product::updateOrCreate(
                ['name' => $product[0]],
                [
                    'description' => $product[1],
                    'price' => $product[2],
                    'stock' => $product[3],
                    'category_id' => $category->id,
                    'image' => match($product[4]) {
                        'Aydınlatma' => 'products/lighting.jpg',
                        'Güvenlik' => 'products/security.jpg',
                        'Enerji Yönetimi' => 'products/energy.jpg',
                        'Temizlik' => 'products/cleaning.jpg',
                        'İklimlendirme' => 'products/climate.jpg',
                        'Sensörler' => 'products/sensor.jpg',
                        'Ev Otomasyonu' => 'products/automation.jpg',
                        default => null,
                    },
                    'is_active' => true,
                ]
            );
        }
    }
}

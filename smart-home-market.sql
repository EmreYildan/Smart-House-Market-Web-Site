-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 May 2026, 15:03:15
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `smart_home_market`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2026-05-07 08:01:49', '2026-05-07 08:01:49'),
(2, 7, '2026-05-07 08:21:16', '2026-05-07 08:21:16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(6, 2, 1, 1, '2026-05-10 06:52:23', '2026-05-10 06:52:23'),
(7, 2, 2, 1, '2026-05-10 06:52:27', '2026-05-10 06:52:27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Aydınlatma', '2026-05-09 09:32:18', '2026-05-09 09:32:18'),
(2, 'Güvenlik', '2026-05-09 09:32:26', '2026-05-09 09:32:26'),
(3, 'Enerji Yönetimi', '2026-05-09 09:32:33', '2026-05-09 09:32:33'),
(4, 'Temizlik', '2026-05-09 09:32:40', '2026-05-09 09:32:40'),
(6, 'İklimlendirme', '2026-05-10 07:28:18', '2026-05-10 07:28:18'),
(7, 'Sensörler', '2026-05-10 07:28:26', '2026-05-10 07:28:26'),
(8, 'Ev Otomasyonu', '2026-05-10 07:28:32', '2026-05-10 07:28:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 1, 3, '2026-05-09 11:45:25', '2026-05-09 11:45:25'),
(4, 7, 2, '2026-05-10 06:51:07', '2026-05-10 06:51:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_05_105729_add_role_and_status_to_users_table', 1),
(5, '2026_05_05_112726_create_products_table', 1),
(6, '2026_05_05_114256_create_carts_table', 1),
(7, '2026_05_05_114258_create_cart_items_table', 1),
(8, '2026_05_06_102345_create_orders_table', 1),
(9, '2026_05_06_102347_create_order_items_table', 1),
(10, '2026_05_07_102005_add_balance_to_users_table', 1),
(11, '2026_05_09_113741_create_categories_table', 2),
(12, '2026_05_09_113748_add_category_id_to_products_table', 2),
(13, '2026_05_09_123621_create_favorites_table', 3),
(14, '2026_05_09_132346_create_reviews_table', 4),
(15, '2026_05_10_090838_add_image_to_reviews_table', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `shipping_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`, `shipping_address`, `created_at`, `updated_at`) VALUES
(1, 1, 299.90, 'received', 'gggg', '2026-05-09 12:57:52', '2026-05-09 12:58:08'),
(2, 7, 699.80, 'pending', 'awaw', '2026-05-10 06:45:41', '2026-05-10 06:45:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 299.90, '2026-05-09 12:57:52', '2026-05-09 12:57:52'),
(2, 2, 2, 1, 399.90, '2026-05-10 06:45:41', '2026-05-10 06:45:41'),
(3, 2, 1, 1, 299.90, '2026-05-10 06:45:41', '2026-05-10 06:45:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `image`, `is_active`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'Akıllı Ampul', 'Mobil uygulama ile kontrol edilebilen Wi-Fi akıllı ampul.', 299.90, 50, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 1),
(2, 'Akıllı Priz', 'Uzaktan açma kapama ve enerji takibi özellikli akıllı priz.', 399.90, 40, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 3),
(3, 'Güvenlik Kamerası', 'Gece görüşlü, hareket algılamalı ev güvenlik kamerası.', 1299.90, 25, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 2),
(4, 'Akıllı Kapı Kilidi', 'Şifre, kart ve mobil uygulama destekli kapı kilidi.', 2499.90, 15, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 2),
(5, 'Hareket Sensörü', 'Ev içi hareket algılama sensörü.', 349.90, 60, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 7),
(6, 'Akıllı Termostat', 'Isı kontrolü sağlayan programlanabilir termostat.', 1799.90, 20, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 6),
(7, 'Robot Süpürge', 'Haritalama özellikli akıllı robot süpürge.', 8999.90, 10, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 4),
(8, 'Akıllı Zil', 'Kameralı ve mobil bildirim destekli kapı zili.', 1499.90, 18, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 2),
(9, 'Wi-Fi Röle', 'Elektrikli cihazları uzaktan kontrol etmeyi sağlar.', 249.90, 70, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 3),
(10, 'Akıllı Perde Motoru', 'Perdelerinizi otomatik açıp kapatmanızı sağlar.', 1999.90, 12, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 8),
(11, 'Akıllı Duman Dedektörü', 'Duman algıladığında mobil bildirim gönderir.', 599.90, 30, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 7),
(12, 'Akıllı Su Kaçağı Sensörü', 'Su sızıntılarını erken algılar.', 449.90, 35, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 7),
(13, 'Akıllı Klima Kumandası', 'Klimayı mobil uygulama ile yönetir.', 799.90, 28, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 6),
(14, 'Akıllı LED Şerit', 'RGB renk seçenekli akıllı LED şerit.', 499.90, 45, NULL, 1, '2026-05-07 08:00:55', '2026-05-07 08:00:55', NULL),
(15, 'Akıllı Hoparlör', 'Sesli komut destekli ev asistanı.', 2299.90, 14, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 8),
(16, 'Akıllı Kamera Hub', 'Birden fazla güvenlik kamerasını tek merkezden yönetir.', 999.90, 22, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 2),
(17, 'Akıllı Garaj Kapısı Modülü', 'Garaj kapısını uzaktan kontrol eder.', 1199.90, 16, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 8),
(18, 'Akıllı Anahtar', 'Işıkları mobil uygulama ile kontrol eder.', 699.90, 38, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 3),
(19, 'Akıllı Hava Kalitesi Sensörü', 'Sıcaklık, nem ve hava kalitesini ölçer.', 899.90, 26, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 7),
(20, 'Akıllı Ev Kontrol Paneli', 'Tüm akıllı cihazları tek ekrandan yönetir.', 3499.90, 8, NULL, 1, '2026-05-07 08:00:55', '2026-05-10 07:31:45', 8),
(21, 'RGB Akıllı LED Şerit', 'Renk değiştirebilen uygulama kontrollü LED şerit.', 499.90, 45, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 1),
(22, 'Akıllı Tavan Lambası', 'Sesli komut destekli modern tavan aydınlatması.', 899.90, 25, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 1),
(23, 'Hareket Algılamalı Gece Lambası', 'Gece otomatik yanan hareket sensörlü lamba.', 249.90, 60, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 1),
(24, 'Akıllı Masa Lambası', 'Parlaklık ve renk sıcaklığı ayarlanabilir masa lambası.', 699.90, 30, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 1),
(25, 'Wi-Fi Bahçe Aydınlatması', 'Dış mekan için uzaktan kontrol edilebilir aydınlatma.', 1199.90, 18, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 1),
(26, 'Akıllı Spot Lamba', 'Salon ve vitrin için yönlendirilebilir akıllı spot lamba.', 549.90, 35, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 1),
(27, 'Dış Mekan Güvenlik Kamerası', 'Yağmur ve rüzgara dayanıklı dış mekan kamerası.', 1899.90, 20, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 2),
(28, 'Akıllı Alarm Sistemi', 'Kapı, pencere ve hareket algılama destekli alarm seti.', 2199.90, 12, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 2),
(29, 'Pencere Güvenlik Sensörü', 'Pencere açıldığında mobil bildirim gönderen sensör.', 349.90, 40, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 2),
(30, 'Enerji Ölçer Akıllı Priz', 'Elektrik tüketimini anlık olarak ölçen akıllı priz.', 549.90, 35, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 3),
(31, 'Akıllı Sigorta Modülü', 'Ev elektrik hattını uzaktan takip etmeyi sağlar.', 1599.90, 10, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 3),
(32, 'Güneş Enerjisi Takip Modülü', 'Ev tipi güneş enerji sistemlerini izler.', 2299.90, 8, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 3),
(33, 'Akıllı Mop Robotu', 'Islak temizlik yapabilen otomatik mop robotu.', 6999.90, 12, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 4),
(34, 'Akıllı Çöp Kutusu', 'Sensörlü kapağa sahip hijyenik çöp kutusu.', 799.90, 25, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 4),
(35, 'Robot Süpürge Toz İstasyonu', 'Robot süpürge için otomatik boşaltma ünitesi.', 3499.90, 9, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 4),
(36, 'Akıllı Cam Temizleme Robotu', 'Cam yüzeyleri otomatik temizleyen robot cihaz.', 4999.90, 7, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 4),
(37, 'Akıllı Isıtıcı Kontrol Modülü', 'Elektrikli ısıtıcıları uzaktan kontrol eder.', 899.90, 22, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 6),
(38, 'Akıllı Kombi Kontrol Cihazı', 'Kombi sıcaklığını mobil uygulama ile ayarlar.', 1999.90, 18, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 6),
(39, 'Akıllı Nemlendirici', 'Oda nem seviyesini otomatik dengeler.', 1499.90, 16, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 6),
(40, 'Akıllı Hava Temizleyici', 'Hava kalitesine göre otomatik çalışan temizleyici.', 3299.90, 14, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 6),
(41, 'Sıcaklık Kontrollü Akıllı Vana', 'Petek sıcaklığını oda bazlı kontrol eder.', 1199.90, 24, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 6),
(42, 'Kapı Pencere Sensörü', 'Kapı veya pencere açılınca bildirim gönderir.', 299.90, 55, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 7),
(43, 'Akıllı Gaz Kaçağı Sensörü', 'Gaz sızıntısı algıladığında alarm verir.', 799.90, 20, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 7),
(44, 'Yağmur Sensörü', 'Dış mekanda yağmur algılayıp otomasyon tetikler.', 649.90, 18, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 7),
(45, 'Akıllı Ev Hub', 'Tüm akıllı cihazları merkezi olarak bağlar.', 1799.90, 20, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 8),
(46, 'Akıllı Senaryo Butonu', 'Tek tuşla ev otomasyonu senaryoları çalıştırır.', 399.90, 42, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 8),
(47, 'Akıllı Sulama Sistemi', 'Bahçe sulamasını hava durumuna göre ayarlar.', 2499.90, 10, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 8),
(48, 'Akıllı Ev Uzaktan Kumanda', 'TV, klima ve cihazları tek kumandadan yönetir.', 899.90, 33, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 8),
(49, 'Akıllı Kapı Otomasyon Modülü', 'Kapı açma kapama işlemlerini otomatikleştirir.', 1399.90, 15, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 8),
(50, 'Akıllı Ev Başlangıç Seti', 'Yeni başlayanlar için hub, priz ve sensör seti.', 2999.90, 11, NULL, 1, '2026-05-10 07:31:45', '2026-05-10 07:31:45', 8);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `comment`, `image`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 1, 'Kırık Ürün geldi', NULL, '2026-05-10 05:40:47', '2026-05-10 05:47:57'),
(2, 2, 1, 3, 'Akıllı ev sistemime kolayca entegre ettim.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(3, 3, 1, 4, 'Ürün gerçekten çok kaliteli, kurulumu da oldukça kolaydı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(4, 4, 1, 3, 'Kurulumu çok kolay.', NULL, '2026-05-10 05:50:18', '2026-05-10 05:50:18'),
(5, 6, 1, 5, 'Benzer ürünlere göre daha kullanışlı buldum.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(6, 7, 1, 3, 'Işık kalitesi güzel, renk seçenekleri başarılı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(7, 2, 2, 4, 'Günlük kullanımda ciddi kolaylık sağlıyor.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(8, 3, 2, 5, 'Elektrik tüketimini takip etmek çok faydalı oldu.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(9, 4, 2, 3, 'Elektrik tüketimini takip etmek çok faydalı oldu.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(10, 5, 2, 4, 'Tasarımı modern ve ev ortamına güzel uyum sağlıyor.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(11, 6, 2, 4, 'Elektrik tüketimini takip etmek çok faydalı oldu.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(12, 3, 3, 3, 'Günlük kullanımda ciddi kolaylık sağlıyor.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(13, 4, 3, 3, 'Kargo hızlıydı ve ürün sağlam şekilde teslim edildi.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(14, 5, 3, 3, 'Mobil uygulama ile kontrol etmesi çok pratik.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(15, 6, 3, 4, 'Enerji tasarrufu konusunda faydasını gördüm.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(16, 7, 3, 4, 'Özellikle otomasyon özelliği çok işime yaradı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(17, 2, 4, 4, 'Bir süredir kullanıyorum, şu ana kadar memnunum.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(18, 3, 4, 3, 'Ürün gerçekten çok kaliteli, kurulumu da oldukça kolaydı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(19, 5, 4, 5, 'Genel olarak başarılı ve tavsiye edilebilir.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(20, 6, 4, 4, 'Ürün gerçekten çok kaliteli.', NULL, '2026-05-10 05:50:18', '2026-05-10 05:50:18'),
(21, 7, 4, 5, 'Günlük kullanımda ciddi kolaylık sağlıyor.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(22, 3, 5, 3, 'Ürün açıklamada anlatıldığı gibi geldi.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(23, 4, 5, 4, 'Kurulumdan sonra sorunsuz çalıştı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(24, 5, 5, 4, 'Fiyat performans açısından başarılı.', NULL, '2026-05-10 05:50:18', '2026-05-10 05:50:18'),
(25, 6, 5, 3, 'Günlük kullanımda ciddi kolaylık sağlıyor.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(26, 7, 5, 5, 'Bildirimleri hızlı gönderiyor.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(27, 2, 6, 4, 'Beklediğimden daha iyi çıktı, fiyatına göre başarılı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(28, 3, 6, 4, 'Beklediğimden daha iyi çıktı, fiyatına göre başarılı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(29, 5, 6, 4, 'Uygulama üzerinden kontrol etmek oldukça rahat.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(30, 6, 6, 3, 'Günlük kullanımda ciddi kolaylık sağlıyor.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(31, 7, 6, 3, 'Enerji tasarrufu konusunda faydasını gördüm.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(32, 2, 7, 3, 'Kargo hızlıydı ve ürün sağlam şekilde teslim edildi.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(33, 3, 7, 5, 'Ev güvenliği açısından güzel bir katkı sağladı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(34, 4, 7, 3, 'Ürün beklentimi karşıladı, kullanım deneyimi iyi.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(35, 6, 7, 5, 'Genel olarak başarılı ve tavsiye edilebilir.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(36, 7, 7, 3, 'Akıllı ev sistemi kurmak isteyenlere tavsiye ederim.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(37, 2, 8, 3, 'Akıllı ev sistemi kurmak isteyenlere tavsiye ederim.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(38, 3, 8, 4, 'Tasarımı çok hoşuma gitti.', NULL, '2026-05-10 05:50:18', '2026-05-10 05:50:18'),
(39, 4, 8, 4, 'Uygulama üzerinden kontrol etmek oldukça rahat.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(40, 5, 8, 3, 'Enerji tasarrufu konusunda faydasını gördüm.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(41, 6, 8, 5, 'Uygulama üzerinden kontrol etmek oldukça rahat.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(42, 2, 9, 4, 'Ev güvenliği açısından güzel bir katkı sağladı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(43, 4, 9, 4, 'Benzer ürünlere göre daha kullanışlı buldum.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(44, 5, 9, 3, 'Tasarımı modern ve ev ortamına güzel uyum sağlıyor.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(45, 6, 9, 3, 'Uzaktan açıp kapatma özelliği çok işlevsel.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(46, 7, 9, 5, 'Ev güvenliği açısından güzel bir katkı sağladı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(47, 2, 10, 5, 'Benzer ürünlere göre daha kullanışlı buldum.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(48, 3, 10, 3, 'Genel olarak başarılı ve tavsiye edilebilir.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(49, 4, 10, 4, 'Günlük kullanımda ciddi kolaylık sağlıyor.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(50, 6, 10, 5, 'Ürün beklentimi karşıladı, kullanım deneyimi iyi.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(51, 7, 10, 5, 'Kurulumdan sonra sorunsuz çalıştı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(52, 2, 11, 5, 'Enerji tasarrufu konusunda faydasını gördüm.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(53, 3, 11, 4, 'Özellikle otomasyon özelliği çok işime yaradı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(54, 4, 11, 5, 'Ürün gerçekten çok kaliteli, kurulumu da oldukça kolaydı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(55, 5, 11, 5, 'Günlük kullanımda ciddi kolaylık sağlıyor.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(56, 7, 11, 4, 'Ürün gerçekten çok kaliteli, kurulumu da oldukça kolaydı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(57, 2, 12, 4, 'Akıllı ev sistemi kurmak isteyenlere tavsiye ederim.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(58, 3, 12, 5, 'Genel olarak başarılı ve tavsiye edilebilir.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(59, 4, 12, 4, 'Akıllı ev sistemime kolayca entegre ettim.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(60, 6, 12, 5, 'Özellikle otomasyon özelliği çok işime yaradı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(61, 7, 12, 3, 'Günlük kullanımda ciddi kolaylık sağlıyor.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(62, 2, 13, 3, 'Bir süredir kullanıyorum memnunum.', NULL, '2026-05-10 05:50:18', '2026-05-10 05:50:18'),
(63, 3, 13, 3, 'Ürün beklentimi karşıladı, kullanım deneyimi iyi.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(64, 4, 13, 4, 'Malzeme kalitesi güzel, paketleme de başarılıydı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(65, 5, 13, 3, 'Malzeme kalitesi güzel, paketleme de başarılıydı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(66, 7, 13, 4, 'Özellikle otomasyon özelliği çok işime yaradı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(67, 2, 14, 3, 'Özellikle otomasyon özelliği çok işime yaradı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(68, 3, 14, 4, 'Fiyat performans açısından gayet mantıklı bir ürün.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(69, 5, 14, 3, 'Ürün beklentimi karşıladı, kullanım deneyimi iyi.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(70, 6, 14, 5, 'Ürün açıklamada anlatıldığı gibi geldi.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(71, 7, 14, 3, 'Ürün açıklamada anlatıldığı gibi geldi.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(72, 2, 15, 3, 'Kurulumdan sonra sorunsuz çalıştı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(73, 4, 15, 5, 'Ürün açıklamada anlatıldığı gibi geldi.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(74, 5, 15, 5, 'Benzer ürünlere göre daha kullanışlı buldum.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(75, 6, 15, 3, 'Akıllı ev sistemime kolayca entegre ettim.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(76, 7, 15, 4, 'Ürün beklentimi karşıladı, kullanım deneyimi iyi.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(77, 3, 16, 5, 'Ürün gerçekten çok kaliteli, kurulumu da oldukça kolaydı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(78, 4, 16, 5, 'Fiyat performans açısından gayet mantıklı bir ürün.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(79, 5, 16, 3, 'Uygulama üzerinden kontrol etmek oldukça rahat.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(80, 6, 16, 4, 'Özellikle otomasyon özelliği çok işime yaradı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(81, 7, 16, 3, 'Ürün gerçekten çok kaliteli, kurulumu da oldukça kolaydı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(82, 2, 17, 4, 'Enerji tasarrufu konusunda faydasını gördüm.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(83, 4, 17, 5, 'Senaryo oluşturma özelliği oldukça kullanışlı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(84, 5, 17, 3, 'Mobil uygulama ile kontrol etmesi çok pratik.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(85, 6, 17, 3, 'Fiyat performans açısından gayet mantıklı bir ürün.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(86, 7, 17, 3, 'Ürün açıklamada anlatıldığı gibi geldi.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(87, 2, 18, 4, 'Genel olarak başarılı ve tavsiye edilebilir.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(88, 3, 18, 3, 'Genel olarak başarılı ve tavsiye edilebilir.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(89, 4, 18, 4, 'Uygulama üzerinden kontrol etmek oldukça rahat.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(90, 5, 18, 5, 'Uzaktan açıp kapatma özelliği çok işlevsel.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(91, 6, 18, 5, 'Ev güvenliği açısından güzel bir katkı sağladı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(92, 2, 19, 5, 'Uygulama üzerinden kontrol etmek oldukça rahat.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(93, 3, 19, 3, 'Özellikle otomasyon özelliği çok işime yaradı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(94, 5, 19, 3, 'Ev güvenliği açısından güzel bir katkı sağladı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(95, 6, 19, 4, 'Uygulama üzerinden kontrol etmek oldukça rahat.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(96, 7, 19, 4, 'Ürün beklentimi karşıladı, kullanım deneyimi iyi.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(97, 2, 20, 4, 'Kurulumdan sonra sorunsuz çalıştı.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(98, 3, 20, 5, 'Akıllı ev sistemime kolayca entegre ettim.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:30:04'),
(99, 4, 20, 4, 'Uygulama üzerinden kontrol etmek oldukça rahat.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(100, 5, 20, 4, 'Tasarımı modern ve ev ortamına güzel uyum sağlıyor.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(101, 6, 20, 3, 'Genel olarak başarılı ve tavsiye edilebilir.', NULL, '2026-05-10 05:50:18', '2026-05-10 07:31:50'),
(102, 2, 3, 4, 'Benzer ürünlere göre daha kullanışlı buldum.', NULL, '2026-05-10 07:30:04', '2026-05-10 07:30:04'),
(103, 4, 4, 3, 'Mobil uygulama ile kontrol etmesi çok pratik.', NULL, '2026-05-10 07:30:04', '2026-05-10 07:30:04'),
(104, 4, 6, 5, 'Malzeme kalitesi güzel, paketleme de başarılıydı.', NULL, '2026-05-10 07:30:04', '2026-05-10 07:30:04'),
(105, 5, 7, 3, 'Ürün açıklamada anlatıldığı gibi geldi.', NULL, '2026-05-10 07:30:04', '2026-05-10 07:31:50'),
(106, 7, 8, 4, 'Beklediğimden daha iyi çıktı, fiyatına göre başarılı.', NULL, '2026-05-10 07:30:04', '2026-05-10 07:31:50'),
(107, 3, 9, 4, 'Beklediğimden daha iyi çıktı, fiyatına göre başarılı.', NULL, '2026-05-10 07:30:04', '2026-05-10 07:30:04'),
(108, 5, 10, 4, 'Ürün beklentimi karşıladı, kullanım deneyimi iyi.', NULL, '2026-05-10 07:30:04', '2026-05-10 07:31:50'),
(109, 6, 11, 5, 'Bir süredir kullanıyorum, şu ana kadar memnunum.', NULL, '2026-05-10 07:30:04', '2026-05-10 07:30:04'),
(110, 5, 12, 3, 'Enerji tasarrufu konusunda faydasını gördüm.', NULL, '2026-05-10 07:30:04', '2026-05-10 07:31:50'),
(111, 4, 14, 3, 'Kargo hızlıydı ve ürün sağlam şekilde teslim edildi.', NULL, '2026-05-10 07:30:04', '2026-05-10 07:31:50'),
(112, 7, 18, 5, 'Kurulumdan sonra sorunsuz çalıştı.', NULL, '2026-05-10 07:30:04', '2026-05-10 07:31:50'),
(113, 4, 19, 4, 'Uygulama üzerinden kontrol etmek oldukça rahat.', NULL, '2026-05-10 07:30:04', '2026-05-10 07:30:04'),
(114, 7, 20, 3, 'Beklediğimden daha iyi çıktı, fiyatına göre başarılı.', NULL, '2026-05-10 07:30:04', '2026-05-10 07:31:50'),
(115, 2, 5, 5, 'Genel olarak başarılı ve tavsiye edilebilir.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(116, 3, 17, 3, 'Enerji tasarrufu konusunda faydasını gördüm.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(117, 2, 21, 4, 'Fiyat performans açısından gayet mantıklı bir ürün.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(118, 3, 21, 3, 'Beklediğimden daha iyi çıktı, fiyatına göre başarılı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(119, 4, 21, 4, 'Akıllı ev sistemi kurmak isteyenlere tavsiye ederim.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(120, 6, 21, 3, 'Tasarımı modern ve ev ortamına güzel uyum sağlıyor.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(121, 7, 21, 3, 'ürün çok da iyi değil', 'reviews/YBImYDB22ObevrbzoSmW2abvbDzjrFLnUxyWriZS.png', '2026-05-10 07:31:50', '2026-05-11 16:02:00'),
(122, 2, 22, 4, 'Genel olarak başarılı ve tavsiye edilebilir.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(123, 3, 22, 5, 'Ürün gerçekten çok kaliteli, kurulumu da oldukça kolaydı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(124, 4, 22, 5, 'Işık kalitesi güzel, renk seçenekleri başarılı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(125, 6, 22, 5, 'Akşamları ortamı çok daha modern gösteriyor.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(126, 7, 22, 3, 'Mobil uygulama ile kontrol etmesi çok pratik.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(127, 2, 23, 4, 'Fiyat performans açısından gayet mantıklı bir ürün.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(128, 4, 23, 4, 'Günlük kullanımda ciddi kolaylık sağlıyor.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(129, 5, 23, 4, 'Beklediğimden daha iyi çıktı, fiyatına göre başarılı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(130, 6, 23, 5, 'Beklediğimden daha iyi çıktı, fiyatına göre başarılı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(131, 2, 24, 3, 'Akıllı ev sistemime kolayca entegre ettim.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(132, 4, 24, 4, 'Akıllı ev sistemi kurmak isteyenlere tavsiye ederim.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(133, 5, 24, 4, 'Uygulama üzerinden kontrol etmek oldukça rahat.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(134, 6, 24, 3, 'Günlük kullanımda ciddi kolaylık sağlıyor.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(135, 7, 24, 4, 'Kurulumdan sonra sorunsuz çalıştı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(136, 2, 25, 4, 'Özellikle otomasyon özelliği çok işime yaradı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(137, 3, 25, 4, 'Işık kalitesi güzel, renk seçenekleri başarılı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(138, 7, 25, 5, 'Bir süredir kullanıyorum, şu ana kadar memnunum.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(139, 2, 26, 5, 'Malzeme kalitesi güzel, paketleme de başarılıydı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(140, 3, 26, 5, 'Ürün beklentimi karşıladı, kullanım deneyimi iyi.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(141, 7, 26, 4, 'Benzer ürünlere göre daha kullanışlı buldum.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(142, 3, 27, 5, 'Mobil uygulama ile kontrol etmesi çok pratik.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(143, 5, 27, 4, 'Bildirim sistemi hızlı çalışıyor.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(144, 6, 27, 3, 'Bir süredir kullanıyorum, şu ana kadar memnunum.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(145, 3, 28, 4, 'Beklediğimden daha iyi çıktı, fiyatına göre başarılı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(146, 4, 28, 3, 'Beklediğimden daha iyi çıktı, fiyatına göre başarılı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(147, 5, 28, 4, 'Akıllı ev sistemi kurmak isteyenlere tavsiye ederim.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(148, 2, 29, 5, 'Akıllı ev sistemime kolayca entegre ettim.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(149, 5, 29, 5, 'Benzer ürünlere göre daha kullanışlı buldum.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(150, 7, 29, 3, 'Kamera ve güvenlik özellikleri beklentimi karşıladı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(151, 3, 30, 4, 'Ev güvenliği açısından güzel bir katkı sağladı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(152, 5, 30, 4, 'Ürün beklentimi karşıladı, kullanım deneyimi iyi.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(153, 6, 30, 4, 'Elektrik tüketimini takip etmek çok faydalı oldu.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(154, 3, 31, 5, 'Elektrik tüketimini takip etmek çok faydalı oldu.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(155, 4, 31, 5, 'Bir süredir kullanıyorum, şu ana kadar memnunum.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(156, 5, 31, 4, 'Kargo hızlıydı ve ürün sağlam şekilde teslim edildi.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(157, 6, 31, 3, 'Ürün beklentimi karşıladı, kullanım deneyimi iyi.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(158, 7, 31, 4, 'Tasarımı modern ve ev ortamına güzel uyum sağlıyor.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(159, 2, 32, 5, 'Akıllı ev sistemi kurmak isteyenlere tavsiye ederim.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(160, 3, 32, 3, 'Kargo hızlıydı ve ürün sağlam şekilde teslim edildi.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(161, 4, 32, 4, 'Uygulama üzerinden kontrol etmek oldukça rahat.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(162, 5, 32, 4, 'Özellikle otomasyon özelliği çok işime yaradı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(163, 7, 32, 4, 'Akıllı ev sistemi kurmak isteyenlere tavsiye ederim.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(164, 2, 33, 4, 'Genel olarak başarılı ve tavsiye edilebilir.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(165, 3, 33, 3, 'Kargo hızlıydı ve ürün sağlam şekilde teslim edildi.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(166, 4, 33, 3, 'Kurulumdan sonra sorunsuz çalıştı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(167, 7, 33, 5, 'Otomatik çalışma özelliği gayet başarılı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(168, 2, 34, 3, 'Malzeme kalitesi güzel, paketleme de başarılıydı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(169, 3, 34, 3, 'Kurulumdan sonra sorunsuz çalıştı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(170, 5, 34, 5, 'Temizlik işini ciddi şekilde kolaylaştırdı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(171, 6, 34, 3, 'Günlük kullanımda ciddi kolaylık sağlıyor.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(172, 7, 34, 4, 'Genel olarak başarılı ve tavsiye edilebilir.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(173, 2, 35, 5, 'Günlük kullanımda ciddi kolaylık sağlıyor.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(174, 3, 35, 5, 'Özellikle otomasyon özelliği çok işime yaradı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(175, 6, 35, 5, 'Özellikle otomasyon özelliği çok işime yaradı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(176, 7, 35, 5, 'Uygulama üzerinden kontrol etmek oldukça rahat.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(177, 2, 36, 4, 'Benzer ürünlere göre daha kullanışlı buldum.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(178, 3, 36, 4, 'Ev güvenliği açısından güzel bir katkı sağladı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(179, 5, 36, 4, 'Kurulumdan sonra sorunsuz çalıştı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(180, 7, 36, 3, 'Fiyat performans açısından gayet mantıklı bir ürün.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(181, 2, 37, 5, 'Akıllı ev sistemi kurmak isteyenlere tavsiye ederim.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(182, 3, 37, 4, 'Ürün açıklamada anlatıldığı gibi geldi.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(183, 7, 37, 5, 'Malzeme kalitesi güzel, paketleme de başarılıydı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(184, 2, 38, 3, 'Mobil uygulama ile kontrol etmesi çok pratik.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(185, 3, 38, 5, 'Genel olarak başarılı ve tavsiye edilebilir.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(186, 4, 38, 4, 'Kargo hızlıydı ve ürün sağlam şekilde teslim edildi.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(187, 5, 38, 4, 'Ürün beklentimi karşıladı, kullanım deneyimi iyi.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(188, 6, 38, 5, 'Genel olarak başarılı ve tavsiye edilebilir.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(189, 3, 39, 3, 'Akıllı ev sistemi kurmak isteyenlere tavsiye ederim.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(190, 4, 39, 4, 'Sıcaklık kontrolü oldukça başarılı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(191, 5, 39, 5, 'Enerji tasarrufu konusunda faydasını gördüm.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(192, 7, 39, 4, 'Akıllı ev sistemi kurmak isteyenlere tavsiye ederim.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(193, 2, 40, 4, 'Akıllı ev sistemi kurmak isteyenlere tavsiye ederim.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(194, 3, 40, 3, 'Kurulumdan sonra sorunsuz çalıştı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(195, 7, 40, 3, 'Özellikle otomasyon özelliği çok işime yaradı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(196, 2, 41, 4, 'Kurulumdan sonra sorunsuz çalıştı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(197, 4, 41, 5, 'Akıllı ev sistemi kurmak isteyenlere tavsiye ederim.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(198, 5, 41, 5, 'Uygulama üzerinden kontrol etmek oldukça rahat.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(199, 2, 42, 5, 'Bir süredir kullanıyorum, şu ana kadar memnunum.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(200, 4, 42, 4, 'Algılama hassasiyeti başarılı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(201, 5, 42, 5, 'Uygulama üzerinden kontrol etmek oldukça rahat.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(202, 7, 42, 4, 'Beklediğimden daha iyi çıktı, fiyatına göre başarılı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(203, 2, 43, 3, 'Mobil uygulama ile kontrol etmesi çok pratik.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(204, 4, 43, 3, 'Ürün gerçekten çok kaliteli, kurulumu da oldukça kolaydı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(205, 5, 43, 5, 'Benzer ürünlere göre daha kullanışlı buldum.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(206, 4, 44, 5, 'Ürün gerçekten çok kaliteli, kurulumu da oldukça kolaydı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(207, 5, 44, 3, 'Mobil uygulama ile kontrol etmesi çok pratik.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(208, 6, 44, 5, 'Mobil uygulama ile kontrol etmesi çok pratik.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(209, 7, 44, 3, 'Beklediğimden daha iyi çıktı, fiyatına göre başarılı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(210, 2, 45, 5, 'Beklediğimden daha iyi çıktı, fiyatına göre başarılı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(211, 4, 45, 5, 'Benzer ürünlere göre daha kullanışlı buldum.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(212, 5, 45, 4, 'Uygulama üzerinden kontrol etmek oldukça rahat.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(213, 2, 46, 3, 'Fiyat performans açısından gayet mantıklı bir ürün.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(214, 3, 46, 3, 'Ürün açıklamada anlatıldığı gibi geldi.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(215, 4, 46, 4, 'Akıllı ev sistemi kurmak isteyenlere tavsiye ederim.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(216, 6, 46, 5, 'Benzer ürünlere göre daha kullanışlı buldum.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(217, 7, 46, 3, 'Senaryo oluşturma özelliği oldukça kullanışlı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(218, 2, 47, 5, 'Günlük kullanımda ciddi kolaylık sağlıyor.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(219, 4, 47, 3, 'Uygulama üzerinden kontrol etmek oldukça rahat.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(220, 7, 47, 3, 'Tasarımı modern ve ev ortamına güzel uyum sağlıyor.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(221, 2, 48, 3, 'Mobil uygulama ile kontrol etmesi çok pratik.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(222, 3, 48, 5, 'Ürün beklentimi karşıladı, kullanım deneyimi iyi.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(223, 4, 48, 4, 'Ev güvenliği açısından güzel bir katkı sağladı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(224, 5, 48, 3, 'Kargo hızlıydı ve ürün sağlam şekilde teslim edildi.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(225, 6, 48, 5, 'Akıllı ev sistemini yönetmek çok kolaylaştı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(226, 2, 49, 3, 'Ürün açıklamada anlatıldığı gibi geldi.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(227, 4, 49, 3, 'Genel olarak başarılı ve tavsiye edilebilir.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(228, 5, 49, 3, 'Akıllı ev sistemini yönetmek çok kolaylaştı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(229, 6, 49, 4, 'Enerji tasarrufu konusunda faydasını gördüm.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(230, 7, 49, 5, 'Senaryo oluşturma özelliği oldukça kullanışlı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(231, 2, 50, 4, 'Benzer ürünlere göre daha kullanışlı buldum.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(232, 3, 50, 4, 'Genel olarak başarılı ve tavsiye edilebilir.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(233, 5, 50, 5, 'Özellikle otomasyon özelliği çok işime yaradı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50'),
(234, 7, 50, 5, 'Ürün gerçekten çok kaliteli, kurulumu da oldukça kolaydı.', NULL, '2026-05-10 07:31:50', '2026-05-10 07:31:50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('038Q5aX9suO7Qa00k7HydHGDY1SzdnxdZpqA08QQ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJ0VkQyUHNjU1BCSnlqV081Z2FPM2ZaMjhwWDlVczdQS0hHVVdRaWJXIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2FkbWluXC9vcmRlcnMiLCJyb3V0ZSI6ImFkbWluLm9yZGVycy5pbmRleCJ9LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=', 1778527178),
('8TOE3XV2Vxv96BKYTgNCP8e779vHsvj84GuTEVho', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'eyJfdG9rZW4iOiJhbHE3cVg1N3o3Nlg3eE9BZjBzaFZna3lqdFI2ZG9GMndXb1VKb0xVIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3VzZXJcL2Rhc2hib2FyZCIsInJvdXRlIjoidXNlci5kYXNoYm9hcmQifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjd9', 1778521360),
('ePk1I3JPgGMcssN2a0d8jx2aPyjy2gVTXTtIe4YX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.119.0 Chrome/142.0.7444.265 Electron/39.8.8 Safari/537.36', 'eyJfdG9rZW4iOiIzek9YUVVCV2NRbVM4SUZWbmlQUzFGUE9OZmx0cGZCNmtQRjhLNUZaIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1778525966),
('TXHQmbnhiyUGwA574qR3trQfrV0o322c0XEbu2xo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.120.0 Chrome/142.0.7444.265 Electron/39.8.8 Safari/537.36', 'eyJfdG9rZW4iOiJoVTlLbFVpemNmdjJ2NTJWUzJKWGp3YWt1RUpmakw3WjRleTlWRlV0IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1779022843);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `balance` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `is_active`, `balance`) VALUES
(1, 'Admin', 'admin@smart.com', NULL, '$2y$12$YPGqmZj3mkr0Siv.UiuCZuMVPTsngt/xTz0JM9gFXvPuobTsNa/wO', NULL, '2026-05-07 08:00:55', '2026-05-07 08:00:55', 'admin', 1, 0.00),
(2, 'Silas Becker', 'shields.sadie@example.net', '2026-05-07 08:00:55', '$2y$12$G/GYwL4rpNzcjaefSGjEg.pIuenIp0oIvax5eHG5MWxAQuXXSBDn.', 'dxQJDIb4mt', '2026-05-07 08:00:55', '2026-05-07 08:00:55', 'user', 1, 0.00),
(3, 'Shane Krajcik', 'philip.schamberger@example.org', '2026-05-07 08:00:55', '$2y$12$G/GYwL4rpNzcjaefSGjEg.pIuenIp0oIvax5eHG5MWxAQuXXSBDn.', 'O2H2plMHSW', '2026-05-07 08:00:55', '2026-05-07 08:00:55', 'user', 1, 0.00),
(4, 'Miss Loma Bednar III', 'kristin13@example.net', '2026-05-07 08:00:55', '$2y$12$G/GYwL4rpNzcjaefSGjEg.pIuenIp0oIvax5eHG5MWxAQuXXSBDn.', 'fEgA7JuNN9', '2026-05-07 08:00:55', '2026-05-07 08:00:55', 'user', 1, 0.00),
(5, 'Kellie Hermann', 'arch.rau@example.net', '2026-05-07 08:00:55', '$2y$12$G/GYwL4rpNzcjaefSGjEg.pIuenIp0oIvax5eHG5MWxAQuXXSBDn.', 'kvmSbjbqiy', '2026-05-07 08:00:55', '2026-05-07 08:00:55', 'user', 1, 0.00),
(6, 'Prof. Karli Baumbach DVM', 'aric.bosco@example.org', '2026-05-07 08:00:55', '$2y$12$G/GYwL4rpNzcjaefSGjEg.pIuenIp0oIvax5eHG5MWxAQuXXSBDn.', 'AnBFJehffs', '2026-05-07 08:00:55', '2026-05-07 08:00:55', 'user', 1, 0.00),
(7, 'emre yıldan', 'emreyildan@gmail.com', NULL, '$2y$12$270vc/cIqEFDWpGiMsL7rOdCeyL.hbvr33sbH7IBBfbulkTnDXBAS', NULL, '2026-05-07 08:05:02', '2026-05-11 14:31:11', 'user', 1, 500.00);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Tablo için indeksler `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Tablo için indeksler `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favorites_user_id_product_id_unique` (`user_id`,`product_id`),
  ADD KEY `favorites_product_id_foreign` (`product_id`);

--
-- Tablo için indeksler `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Tablo için indeksler `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Tablo için indeksler `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Tablo için indeksler `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reviews_user_id_product_id_unique` (`user_id`,`product_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Tablo için indeksler `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Tablo için AUTO_INCREMENT değeri `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Tablo kısıtlamaları `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

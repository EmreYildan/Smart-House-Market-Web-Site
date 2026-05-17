<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $city = $request->city ?? 'İstanbul';

        $locationResponse = Http::withoutVerifying()->get('https://geocoding-api.open-meteo.com/v1/search', [
            'name' => $city,
            'count' => 1,
            'language' => 'tr',
            'format' => 'json',
        ]);

        $weather = null;
        $recommendedProducts = collect();

        if ($locationResponse->successful() && isset($locationResponse['results'][0])) {
            $location = $locationResponse['results'][0];

            $weatherResponse = Http::withoutVerifying()->get('https://api.open-meteo.com/v1/forecast', [
                'latitude' => $location['latitude'],
                'longitude' => $location['longitude'],
                'current' => 'temperature_2m,wind_speed_10m',
                'timezone' => 'Europe/Istanbul',
            ]);

            if ($weatherResponse->successful()) {
                $weather = $weatherResponse->json('current');

                $temperature = $weather['temperature_2m'];
                $windSpeed = $weather['wind_speed_10m'];

                if ($temperature < 15) {
                    $recommendedProducts = Product::whereHas('category', function ($query) {
                        $query->where('name', 'like', '%İklimlendirme%');
                    })->where('is_active', true)->take(3)->get();
                } elseif ($windSpeed > 20) {
                    $recommendedProducts = Product::whereHas('category', function ($query) {
                        $query->where('name', 'like', '%Güvenlik%')
                              ->orWhere('name', 'like', '%Sensör%');
                    })->where('is_active', true)->take(3)->get();
                } else {
                    $recommendedProducts = Product::whereHas('category', function ($query) {
                        $query->where('name', 'like', '%Ev Otomasyonu%');
                    })->where('is_active', true)->take(3)->get();
                }
            }
        }

        return view('weather.index', compact('weather', 'city', 'recommendedProducts'));
    }
}

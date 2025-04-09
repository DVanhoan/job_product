<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ProvinceService
{
    public static $apiUrl = 'https://provinces.open-api.vn/api';
    public static $token = '38cbbe3d1fb748505d4bc707bbfa33e1434119257b1a97acab4b8b22a7bc0110';

    public static function getProvinces()
    {
        $response = Http::withToken(self::$token)->get(self::$apiUrl);

        if ($response->successful()) {
            return [
                'results' => $response->json(),
            ];
        }

        return null;
    }
}

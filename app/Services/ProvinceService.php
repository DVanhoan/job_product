<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ProvinceService
{
    protected $apiUrl = 'https://vapi.vnappmob.com/api/province';
    protected $token = '38cbbe3d1fb748505d4bc707bbfa33e1434119257b1a97acab4b8b22a7bc0110';

    public function getProvinces()
    {
        $response = Http::withToken($this->token)->get("{$this->apiUrl}");

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}

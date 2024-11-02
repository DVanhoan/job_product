<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ProvinceService
{
    protected $apiUrl = 'https://vapi.vnappmob.com/api/province';
    protected $token = 'YOUR_ACCESS_TOKEN';

    public function getProvinces()
    {
        $response = Http::withToken($this->token)->get("{$this->apiUrl}");

        if ($response->successful()) {
            return $response->json(); // Trả về danh sách tỉnh/thành
        }

        return null;
    }
}

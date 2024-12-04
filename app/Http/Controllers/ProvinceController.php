<?php

namespace App\Http\Controllers;

use App\Models\Province;

class ProvinceController extends Controller
{
    public function getProvinces()
    {
        $provinces = Province::all();


        return $provinces->map(function ($province) {
            return (object) [
                'id' => $province->id,
                'name' => $province->name,
                'type' => $province->type,
            ];
        });
    }


    public static function getProvinceName()
    {
        $provinces = Province::pluck('name')->toArray();

        return empty($provinces) ? ['Unknown'] : $provinces;
    }
}

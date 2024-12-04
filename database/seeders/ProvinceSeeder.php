<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $TinhThanh = [
            ['name' => 'Ha Noi City', 'type' => 'City'],
            ['name' => 'Can Tho City', 'type' => 'City'],
            ['name' => 'Da Nang City', 'type' => 'City'],
            ['name' => 'Hai Phong City', 'type' => 'City'],
            ['name' => 'Ho Chi Minh City', 'type' => 'City'],
            ['name' => 'An Giang Province', 'type' => 'Province'],
            ['name' => 'Ba Ria - Vung Tau Province', 'type' => 'Province'],
            ['name' => 'Bac Lieu Province', 'type' => 'Province'],
            ['name' => 'Bac Giang Province', 'type' => 'Province'],
            ['name' => 'Bac Kan Province', 'type' => 'Province'],
            ['name' => 'Bac Ninh Province', 'type' => 'Province'],
            ['name' => 'Ben Tre Province', 'type' => 'Province'],
            ['name' => 'Binh Duong Province', 'type' => 'Province'],
            ['name' => 'Binh Dinh Province', 'type' => 'Province'],
            ['name' => 'Binh Phuoc Province', 'type' => 'Province'],
            ['name' => 'Binh Thuan Province', 'type' => 'Province'],
            ['name' => 'Ca Mau Province', 'type' => 'Province'],
            ['name' => 'Cao Bang Province', 'type' => 'Province'],
            ['name' => 'Dak Lak Province', 'type' => 'Province'],
            ['name' => 'Dak Nong Province', 'type' => 'Province'],
            ['name' => 'Dien Bien Province', 'type' => 'Province'],
            ['name' => 'Dong Nai Province', 'type' => 'Province'],
            ['name' => 'Dong Thap Province', 'type' => 'Province'],
            ['name' => 'Gia Lai Province', 'type' => 'Province'],
            ['name' => 'Ha Giang Province', 'type' => 'Province'],
            ['name' => 'Ha Nam Province', 'type' => 'Province'],
            ['name' => 'Ha Tinh Province', 'type' => 'Province'],
            ['name' => 'Hai Duong Province', 'type' => 'Province'],
            ['name' => 'Hau Giang Province', 'type' => 'Province'],
            ['name' => 'Hoa Binh Province', 'type' => 'Province'],
            ['name' => 'Hung Yen Province', 'type' => 'Province'],
            ['name' => 'Khanh Hoa Province', 'type' => 'Province'],
            ['name' => 'Kien Giang Province', 'type' => 'Province'],
            ['name' => 'Kon Tum Province', 'type' => 'Province'],
            ['name' => 'Lai Chau Province', 'type' => 'Province'],
            ['name' => 'Lang Son Province', 'type' => 'Province'],
            ['name' => 'Lao Cai Province', 'type' => 'Province'],
            ['name' => 'Lam Dong Province', 'type' => 'Province'],
            ['name' => 'Long An Province', 'type' => 'Province'],
            ['name' => 'Nam Dinh Province', 'type' => 'Province'],
            ['name' => 'Nghe An Province', 'type' => 'Province'],
            ['name' => 'Ninh Binh Province', 'type' => 'Province'],
            ['name' => 'Ninh Thuan Province', 'type' => 'Province'],
            ['name' => 'Phu Tho Province', 'type' => 'Province'],
            ['name' => 'Phu Yen Province', 'type' => 'Province'],
            ['name' => 'Quang Binh Province', 'type' => 'Province'],
            ['name' => 'Quang Nam Province', 'type' => 'Province'],
            ['name' => 'Quang Ngai Province', 'type' => 'Province'],
            ['name' => 'Quang Ninh Province', 'type' => 'Province'],
            ['name' => 'Quang Tri Province', 'type' => 'Province'],
            ['name' => 'Soc Trang Province', 'type' => 'Province'],
            ['name' => 'Son La Province', 'type' => 'Province'],
            ['name' => 'Tay Ninh Province', 'type' => 'Province'],
            ['name' => 'Thai Binh Province', 'type' => 'Province'],
            ['name' => 'Thai Nguyen Province', 'type' => 'Province'],
            ['name' => 'Thanh Hoa Province', 'type' => 'Province'],
            ['name' => 'Thua Thien Hue Province', 'type' => 'Province'],
            ['name' => 'Tien Giang Province', 'type' => 'Province'],
            ['name' => 'Tra Vinh Province', 'type' => 'Province'],
            ['name' => 'Tuyen Quang Province', 'type' => 'Province'],
            ['name' => 'Vinh Long Province', 'type' => 'Province'],
            ['name' => 'Vinh Phuc Province', 'type' => 'Province'],
            ['name' => 'Yen Bai Province', 'type' => 'Province'],
        ];

        foreach ($TinhThanh as $location) {
            DB::table('provinces')->updateOrInsert(
                ['name' => $location['name']],
                $location
            );
        }
    }
}

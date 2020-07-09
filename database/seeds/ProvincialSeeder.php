<?php

use Illuminate\Database\Seeder;

class ProvincialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provincials = [
            ['region_id' => "1" , 'name' => "Lai Châu"],
            ['region_id' => "1" , 'name' => "Sơn La"],
            ['region_id' => "1" , 'name' => "Lào Cai"],
            ['region_id' => "1" , 'name' => "Hòa Bình"],
            ['region_id' => "1" , 'name' => "Điện Biên"],
            ['region_id' => "1" , 'name' => "Yên Bái"],
            ['region_id' => "1" , 'name' => "Hà Giang"],
            ['region_id' => "1" , 'name' => "Cao Bằng"],
            ['region_id' => "1" , 'name' => "Bắc Kạn"],
            ['region_id' => "1" , 'name' => "Lạng Sơn"],
            ['region_id' => "1" , 'name' => "Tuyên Quang"],
            ['region_id' => "1" , 'name' => "Hà Nội"],
            ['region_id' => "1" , 'name' => "Bắc Ninh"],
            ['region_id' => "1" , 'name' => "Quảng Ninh"],
            ['region_id' => "1" , 'name' => "Thái Nguyên"],
            ['region_id' => "1" , 'name' => "Phú Thọ"],
            ['region_id' => "1" , 'name' => "Bắc Giang"],
            ['region_id' => "1" , 'name' => "Hà Nam"],
            ['region_id' => "1" , 'name' => "Hải Dương"],
            ['region_id' => "1" , 'name' => "Hưng Yên"],
            ['region_id' => "1" , 'name' => "Hải Phòng"],
            ['region_id' => "1" , 'name' => "Nam Định"],
            ['region_id' => "1" , 'name' => "Ninh Bình"],
            ['region_id' => "1" , 'name' => "Thái Bình"],
            ['region_id' => "1" , 'name' => "Vĩnh Phúc"],
            ['region_id' => "2" , 'name' => "Thanh Hoá"],
            ['region_id' => "2" , 'name' => "Nghệ An"],
            ['region_id' => "2" , 'name' => "Hà Tĩnh"],
            ['region_id' => "2" , 'name' => "Quảng Bình"],
            ['region_id' => "2" , 'name' => "Quảng Trị"],
            ['region_id' => "2" , 'name' => "Thừa Thiên-Huế"],
            ['region_id' => "2" , 'name' => "Đà Nẵng"],
            ['region_id' => "2" , 'name' => "Quảng Nam"],
            ['region_id' => "2" , 'name' => "Quảng Ngãi"],
            ['region_id' => "2" , 'name' => "Bình Định"],
            ['region_id' => "2" , 'name' => "Phú Yên"],
            ['region_id' => "2" , 'name' => "Khánh Hoà"],
            ['region_id' => "2" , 'name' => "Ninh Thuận"],
            ['region_id' => "2" , 'name' => "Bình Thuận"],
            ['region_id' => "2" , 'name' => "Kon Tum"],
            ['region_id' => "2" , 'name' => "Gia Lai"],
            ['region_id' => "2" , 'name' => "Đắc Lắc"],
            ['region_id' => "2" , 'name' => "Đắc Nông"],
            ['region_id' => "2" , 'name' => "Lâm Đồng"],
            ['region_id' => "3" , 'name' => "Bình Phước"],
            ['region_id' => "3" , 'name' => "Bình Dương"],
            ['region_id' => "3" , 'name' => "Đồng Nai"],
            ['region_id' => "3" , 'name' => "Tây Ninh"],
            ['region_id' => "3" , 'name' => "Bà Rịa-Vũng Tàu"],
            ['region_id' => "3" , 'name' => "Thành Phố Hồ Chí Minh"],
            ['region_id' => "3" , 'name' => "Long An"],
            ['region_id' => "3" , 'name' => "Đồng Tháp"],
            ['region_id' => "3" , 'name' => "Tiền Giang"],
            ['region_id' => "3" , 'name' => "An Giang"],
            ['region_id' => "3" , 'name' => "Bến Tre"],
            ['region_id' => "3" , 'name' => "Vĩnh Long"],
            ['region_id' => "3" , 'name' => "Trà Vinh"],
            ['region_id' => "3" , 'name' => "Hậu Giang"],
            ['region_id' => "3" , 'name' => "Kiên Giang"],
            ['region_id' => "3" , 'name' => "Sóc Trăng"],
            ['region_id' => "3" , 'name' => "Bạc Liêu"],
            ['region_id' => "3" , 'name' => "Cà Mau"],
            ['region_id' => "3" , 'name' => "Cần Thơ"],
            ['region_id' => "4" , 'name' => "Nước Ngoài"],
        ];

        DB::table('provincials')->insert($provincials);
    }
}

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
            ['region_id' => "1" , 'name' => "Thái Nguyên"],
            ['region_id' => "1" , 'name' => "Sơn La"],
            ['region_id' => "1" , 'name' => "Lào Cai"],
            ['region_id' => "1" , 'name' => "Hà Giang"],
            ['region_id' => "1" , 'name' => "Hà Nội"],
            ['region_id' => "1" , 'name' => "Bắc Ninh"],
            ['region_id' => "1" , 'name' => "Quảng Ninh"],
            ['region_id' => "3" , 'name' => "Hồ Chí Minh"],
            ['region_id' => "3" , 'name' => "Đà Nẵng"],
            ['region_id' => "3" , 'name' => "Sóc Trăng"],
            ['region_id' => "2" , 'name' => "Huế"],
            ['region_id' => "1" , 'name' => "miền bắc"],
            ['region_id' => "1" , 'name' => "miền bắc"],
            ['region_id' => "1" , 'name' => "miền bắc"],
            ['region_id' => "1" , 'name' => "miền bắc"],
        ];

        DB::table('provincials')->insert($provincials);
    }
}

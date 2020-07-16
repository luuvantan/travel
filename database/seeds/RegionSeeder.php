<?php

use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
        $regions = [
            ['name' => "Miền Bắc"],
            ['name' => "Miền Trung"],
            ['name' => "Miền Nam"],
            ['name' => "Nước Ngoài"]
        ];
        
        DB::table('regions')->insert($regions);

    }
}

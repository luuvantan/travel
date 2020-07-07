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
        ];
        
        DB::table('regions')->insert($regions);

    }
}

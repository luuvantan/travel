<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => "Ẩm Thực"],
            ['name' => "Thông Tin Cần Biết"],
            ['name' => "Du Lịch"],
            ['name' => "Cẩm Nang Du Lịch"],
        ];
        
        DB::table('categories')->insert($categories);
    }
}

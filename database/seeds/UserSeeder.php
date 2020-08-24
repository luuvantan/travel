<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<12; $i++) {
            DB::table('users')->insert([
                'name' => 'admin'. $i,
                'email' => 'admin'. $i.'@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 1,
                'avatar' => '/storage/4/12/1594822829.JPG',
                'created_at' => Carbon::create(2019, $i, 1, 0, 0, 0)->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::create(2019, $i, 1, 0, 0, 0)->format('Y-m-d H:i:s'),
            ]);
        }
        for($i=20; $i<30; $i++) {
            DB::table('users')->insert([
                'name' => $i . 'TanLV'. $i,
                'email' => $i . 'TanLV'. $i.'@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 0,
                'avatar' => '/storage/4/9/1594919477.jpg',
                'created_at' => Carbon::create(2018, $i, 1, 0, 0, 0)->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::create(2018, $i, 1, 0, 0, 0)->format('Y-m-d H:i:s'),
            ]);
        }
        for($i=20; $i<30; $i++) {
            DB::table('users')->insert([
                'name' => 'VuVan'. $i,
                'email' => 'VuVan'. $i.'@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 0,
                'avatar' => '/storage/1/32/1594919094.jpg',
                'created_at' => Carbon::create(2017, $i, 1, 0, 0, 0)->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::create(2017, $i, 1, 0, 0, 0)->format('Y-m-d H:i:s'),
            ]);
        }
        for($i=1; $i<10; $i++) {
            DB::table('users')->insert([
                'name' => 'Trung'. $i,
                'email' => 'Trung'. $i.'@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 0,
                'avatar' => '/storage/4/55/1596994337.jpg',
                'created_at' => Carbon::create(2020, $i, 1, 0, 0, 0)->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::create(2020, $i, 1, 0, 0, 0)->format('Y-m-d H:i:s'),
            ]);
        }
    }
}

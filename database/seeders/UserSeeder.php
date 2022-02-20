<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['Email' => 'admin@gmail.com',  'Password' => bcrypt('12345'), 'Name' => 'Admin', 'Phone' => '19001000', 'Address' => 'Unknown', 'Avatar' => null, 'UserType_id' => 1],
            ['Email' => 'nt9a3chienvanchuong@gmail.com', 'Password' => bcrypt('chien'), 'Name' => 'Chien Van', 'Phone' => '12345678', 'Address' => 'Quận 8', 'Avatar' => 'chien', 'UserType_id' => 2],
            ['Email' => 'mantran@gmail.com',  'Password' => bcrypt('man'), 'Name' => 'Thanh Man', 'Phone' => '12345678', 'Address' => 'My Tho', 'Avatar' => 'man', 'UserType_id' => 2],
            ['Email' => 'KhoaNguyen@gmail.com', 'Password' => bcrypt('khoa'), 'Name' => 'Dang Khoa', 'Phone' => '12345678', 'Address' => 'Quận 1', 'Avatar' => 'khoa', 'UserType_id' => 2],
        ]);
    }
}

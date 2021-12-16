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
            ['Email' => 'admin',  'Password' => bcrypt('12345'), 'Name' => 'Admin', 'Phone' => '19001000', 'Address' => 'Unknown', 'Avatar' => '', 'UserType_id' => 1],
            ['Email' => 'chienvan', 'Password' => bcrypt('chien'), 'Name' => 'Chien Van', 'Phone' => '12345678', 'Address' => 'Quận 8', 'Avatar' => '', 'UserType_id' => 2],
            ['Email' => 'mantran',  'Password' => bcrypt('man'), 'Name' => 'Thanh Man', 'Phone' => '12345678', 'Address' => 'My Tho', 'Avatar' => '', 'UserType_id' => 2],
            ['Email' => 'KhoaNguyen', 'Password' => bcrypt('khoa'), 'Name' => 'Dang Khoa', 'Phone' => '12345678', 'Address' => 'Quận 1', 'Avatar' => '', 'UserType_id' => 2],
        ]);
    }
}

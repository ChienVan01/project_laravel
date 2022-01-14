<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->insert([
            ['Name' => 'Chưa thanh toán'],
            ['Name' => 'Đã thanh toán'],
            ['Name' => 'Đã xác nhận'],
            ['Name' => 'Đã hủy'],
            ['Name' => 'Đã hoàn thành'],
        ]);
    }
}

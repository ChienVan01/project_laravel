<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert([
            ['Name' => 'Tiền mặt'],
            ['Name' => 'MOMO'],
            ['Name' => 'Paypal'],
            ['Name' => 'VNpay'],
        ]);
    }
}

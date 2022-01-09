<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vouchers')->insert([
            ['Name' => 'Giảm Giá 10%','User_id'=>'3','EXD'=>'2022-1-30 23:59:59','Content'=>'Giảm 10% giá trị đơn hàng nhân dịp năm mới 2022','Quantity'=>'2',],
            ['Name' => 'Giảm Giá 15%','User_id'=>'2','EXD'=>'2022-1-30 23:59:59','Content'=>'Giảm 15% giá trị đơn hàng nhân dịp năm mới 2022','Quantity'=>'4',],
            ['Name' => 'Giảm Giá 20%','User_id'=>'2','EXD'=>'2022-1-30 23:59:59','Content'=>'Giảm 20% giá trị đơn hàng nhân dịp năm mới 2022','Quantity'=>'3',],
            ['Name' => 'Giảm Giá 25%','User_id'=>'3','EXD'=>'2022-1-30 23:59:59','Content'=>'Giảm 25% giá trị đơn hàng nhân dịp năm mới 2022','Quantity'=>'2',], 
            ['Name' => 'Giảm Giá 30%','User_id'=>'4','EXD'=>'2022-1-30 23:59:59','Content'=>'Giảm 30% giá trị đơn hàng nhân dịp năm mới 2022','Quantity'=>'1',], 
        ]);
    }
}

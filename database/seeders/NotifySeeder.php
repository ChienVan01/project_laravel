<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotifySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //Name, User_id, ReceivedDate, Content
    public function run()
    {
        DB::table('notifies')->insert([
            ['Name'=>'Mừng Năm Mới 2022','User_id'=>'1', 'ReceivedDate'=>'2022-1-30 23:59:59','Content'=>'Nhân dịp năm mới 2022 ShopGear kính chúc quý khách an khang thịnh vượng, vạn sự như ý',],
            ['Name'=>'Mừng Năm Mới 2022','User_id'=>'2', 'ReceivedDate'=>'2022-1-30 23:59:59','Content'=>'Nhân dịp năm mới 2022 ShopGear kính chúc quý khách an khang thịnh vượng, vạn sự như ý',],            
            ['Name'=>'Mừng Năm Mới 2022','User_id'=>'3', 'ReceivedDate'=>'2022-1-30 23:59:59','Content'=>'Nhân dịp năm mới 2022 ShopGear kính chúc quý khách an khang thịnh vượng, vạn sự như ý',],            
            ['Name'=>'Mừng Năm Mới 2022','User_id'=>'4', 'ReceivedDate'=>'2022-1-30 23:59:59','Content'=>'Nhân dịp năm mới 2022 ShopGear kính chúc quý khách an khang thịnh vượng, vạn sự như ý',],
        ]);
    }
}

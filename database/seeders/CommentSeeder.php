<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //Rate int, Evaluate string, Product_id, User_id
    public function run()
    {
        DB::table('comments')->insert([
            ['Rate'=>'5', 'Evaluate'=>'Dùng thích lắm ạ', 'Product_id'=>'2', 'User_id'=>'2'],
            ['Rate'=>'4', 'Evaluate'=>'Giao hơi trễ. Nhưng dùng thích lắm ạ', 'Product_id'=>'3', 'User_id'=>'4'],
            ['Rate'=>'4.5', 'Evaluate'=>'Chất lượng tốt', 'Product_id'=>'2', 'User_id'=>'3'],
            ['Rate'=>'3', 'Evaluate'=>'Giao hàng chậm quá', 'Product_id'=>'2', 'User_id'=>'2'],
            ['Rate'=>'5', 'Evaluate'=>'Dùng thích lắm ạ', 'Product_id'=>'4', 'User_id'=>'2'],
        ]);
    }
}

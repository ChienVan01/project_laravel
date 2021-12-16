<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_images')->insert([
            // sản phẩm 1
            ['Image' => 'image2.jpg', 'Product_id' => 1],
            ['Image' => 'image2_1.jpg', 'Product_id' => 1],
            ['Image' => 'image2_2.jpg', 'Product_id' => 1],
            // sản phẩm 2
            ['Image' => 'image8.jpg', 'Product_id' => 2],
            ['Image' => 'image8_1.jpg', 'Product_id' => 2],
            ['Image' => 'image8_2.jpg', 'Product_id' => 2],
            // sản phẩm 3
            ['Image' => 'image7.jpg', 'Product_id' => 3],
            ['Image' => 'image7_1.png', 'Product_id' => 3],
            ['Image' => 'image7_2.png', 'Product_id' => 3],
        ]);
    }
}

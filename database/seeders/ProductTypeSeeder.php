<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->insert([
            ['Name' => 'Laptop', 'Parent_id' => null],
            ['Name' => 'PC', 'Parent_id' => null],
            ['Name' => 'Laptop Gaming', 'Parent_id' => 1],
            ['Name' => 'PC Gaming', 'Parent_id' => 2],
            ['Name' => 'Linh kiện', 'Parent_id' => null],
            ['Name' => 'CPU', 'Parent_id' => 5],
            ['Name' => 'RAM', 'Parent_id' => 5],
            ['Name' => 'MainBoard', 'Parent_id' => 5],
            ['Name' => 'Monitor', 'Parent_id' => 5],
            ['Name' => 'Storage', 'Parent_id' => 5],
            ['Name' => 'Power', 'Parent_id' => 5],
            ['Name' => 'VGA', 'Parent_id' => 5],
            ['Name' => 'Cooler', 'Parent_id' => 5],
            ['Name' => 'Fan', 'Parent_id' => 5],
            ['Name' => 'Case', 'Parent_id' => 5],
            ['Name' => 'Headphone', 'Parent_id' => 5],
            ['Name' => 'Bàn phím', 'Parent_id' => 5],
            ['Name' => 'Chuột', 'Parent_id' => 5],
            ['Name' => 'Ghế Gaming', 'Parent_id' => null],
            ['Name' => 'Phụ kiện', 'Parent_id' => null],
        ]);
    }
}

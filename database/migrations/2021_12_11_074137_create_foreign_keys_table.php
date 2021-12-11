<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('ProductType_id')->references('id')->on('product_types');
        });
        Schema::table('product_images', function (Blueprint $table) {
            $table->foreign('Product_id')->references('id')->on('products');
        });
        Schema::table('product_types', function (Blueprint $table) {
            $table->foreign('Parent_id')->references('id')->on('product_types');
        });
        Schema::table('detail_configurations', function (Blueprint $table) {
            $table->foreign('ProductType_id')->references('id')->on('product_types');
            $table->foreign('Configuration_id')->references('id')->on('configurations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

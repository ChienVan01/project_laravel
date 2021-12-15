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
        Schema::table('notifies', function (Blueprint $table) {                      
            $table->foreign('User_id')->references('id')->on('users');      
        });
        Schema::table('comments', function (Blueprint $table) {                      
            $table->foreign('User_id')->references('id')->on('users');  
            $table->foreign('Product_id')->references('id')->on('products');    
        });
        Schema::table('user_reset_passwords', function (Blueprint $table) {                      
            $table->foreign('User_id')->references('id')->on('users');      
        });
        Schema::table('user_activations', function (Blueprint $table) {                      
            $table->foreign('User_id')->references('id')->on('users');      
        });
        
        Schema::table('orders', function (Blueprint $table) {       
            $table->foreign('Payment_id')->references('id')->on('payments');     
            $table->foreign('User_id')->references('id')->on('users');      
            $table->foreign('Voucher_id')->references('id')->on('vouchers');
            $table->foreign('OrderStatus_id')->references('id')->on('order_statuses');
        });
        Schema::table('detail_orders', function (Blueprint $table) {
            $table->foreign('Order_id')->references('id')->on('orders');
            $table->foreign('Product_id')->references('id')->on('products');
        });
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

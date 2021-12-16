<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('Payment_id');
            $table->unsignedBigInteger('User_id');
            $table->unsignedBigInteger('Voucher_id');
            $table->unsignedBigInteger('OrderStatus_id');
            $table->date('TimeBuy');
            $table->Decimal('TotalPrice');
            $table->boolean('Status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

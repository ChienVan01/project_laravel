<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Email');
            $table->string('Password');
            $table->string('Name')->nullable();
            $table->string('Phone')->nullable();
            $table->string('Address')->nullable();
            $table->string('Avatar')->nullable();
            $table->string('otp')->nullable();
            $table->unsignedBigInteger('UserType_id')->default(2);
            $table->boolean('Status')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

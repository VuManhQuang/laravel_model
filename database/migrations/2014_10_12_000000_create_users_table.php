<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id_thanhvien');
            $table->string('facebook_id')->unique();
            $table->string('username',255);
            $table->string('email',255);
            $table->string('password',100);
      
            $table->string('phone_user',13);
            $table->string('diachi_user',500);
            $table->integer('kieu');
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

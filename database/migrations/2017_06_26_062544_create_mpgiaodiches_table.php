<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpgiaodichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpgiaodiches', function (Blueprint $table) {
             $table->increments('id_giaodich');
            $table->decimal('amount',15,3);
            $table->text('message');
            $table->string('payment',255);
            $table->integer('status');
            $table->string('user_email',255);
            $table->string('user_name',255);
            $table->string('user_phone',13);
            $table->integer('id_thanhvien');
    
            $table->integer('id_quatang');
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
        Schema::dropIfExists('mpgiaodiches');
    }
}

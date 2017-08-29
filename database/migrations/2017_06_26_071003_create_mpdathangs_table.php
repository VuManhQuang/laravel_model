<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpdathangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpdathangs', function (Blueprint $table) {
            $table->increments('id_order');
            $table->text('data');
            $table->text('qty');
            $table->text('amount');
            $table->string('ten_sanpham',255);
            $table->integer('id_sanpham')->unsigned();
            $table->foreign('id_sanpham')->references('id_sanpham')->on('mpprodcuts')->onDelete('cascade');
             $table->integer('id_giaodich')->unsigned();
            $table->foreign('id_giaodich')->references('id_giaodich')->on('mpgiaodiches')->onDelete('cascade');
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
        Schema::dropIfExists('mpdathangs');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMptheloaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mptheloais', function (Blueprint $table) {
           $table->increments('id_danhmuc');
            $table->string('ten_danhmuc');
            $table->string('alias');
            $table->longtext('noidung_danhmuc');
            $table->string('banner_anhdai',300);
            $table->integer('parent_id');
            $table->integer('thutu');
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
        Schema::dropIfExists('mptheloais');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpprodcutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpprodcuts', function (Blueprint $table) {
             $table->increments('id_sanpham');
            $table->string('ten_sanpham',255);
            $table->string('alias',255);

            $table->decimal('discount',15,3);
            $table->text('anh_sanpham_to');
            $table->decimal('gia',15,3);
            $table->text('cach_sudung');
            $table->text('noidung_thucvat');
            $table->text('noidung_hieuqua');
            $table->text('noidung_sanpham');
            $table->text('view');
            $table->string('the_tich',10);
            $table->string('tieude_hieuqua',255);
            $table->string('tieude_thucvat',255);
            $table->integer('ton_kho_sp');
            $table->string('rate_total',255);
            $table->string('rate_count',255);
            $table->integer('id_danhmuc')->unsigned();
            $table->foreign('id_danhmuc')->references('id_danhmuc')->on('mptheloais')->onDelete('cascade');
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
        Schema::dropIfExists('mpprodcuts');
    }
}

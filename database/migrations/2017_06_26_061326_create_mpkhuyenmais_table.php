<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpkhuyenmaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpkhuyenmais', function (Blueprint $table) {
            $table->increments('id_khuyenmai');
            $table->string('sukien',255)->unique();
            $table->text('thoigian_batdau');
            $table->text('thoigian_ketthuc');
             $table->text('anh_khuyenmai');
            $table->text('ghichu_khuyenmai');
            $table->text('noi_dung_km');
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
        Schema::dropIfExists('mpkhuyenmais');
    }
}

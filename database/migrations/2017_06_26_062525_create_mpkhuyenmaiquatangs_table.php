<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpkhuyenmaiquatangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpkhuyenmaiquatangs', function (Blueprint $table) {
             $table->integer('id_khuyenmai')->unsigned();

            $table->foreign('id_khuyenmai')->references('id_khuyenmai')->on('mpkhuyenmais')->onDelete('cascade');
             $table->integer('id_quatang')->unsigned();
            $table->foreign('id_quatang')->references('id_quatang')->on('mpquatangs')->onDelete('cascade');
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
        Schema::dropIfExists('mpkhuyenmaiquatangs');
    }
}

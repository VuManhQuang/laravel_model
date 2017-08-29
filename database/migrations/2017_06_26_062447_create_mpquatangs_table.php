<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpquatangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpquatangs', function (Blueprint $table) {
            $table->increments('id_quatang');
            $table->integer('capdo');
            $table->string('quatang',255)->unique();
            $table->decimal('tong_giatri',15,3);
            $table->string('ma_quatang',255)->unique();
          
            $table->integer('tonkho');
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
        Schema::dropIfExists('mpquatangs');
    }
}

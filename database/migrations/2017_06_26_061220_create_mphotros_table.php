<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMphotrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mphotros', function (Blueprint $table) {
          $table->increments('id_lienhe');
            $table->string('email_lienhe',255);
            $table->string('ten_lienhe',255);
            $table->string('skype',255);
            $table->string('phone_lienhe',13);
            $table->text('diachi_lienhe');
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
        Schema::dropIfExists('mphotros');
    }
}

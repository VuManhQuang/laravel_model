<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpquangcaosanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpquangcaosanphams', function (Blueprint $table) {
             $table->increments('id');
            $table->text('anh_quangcao');
            $table->integer('hienthi');
            $table->integer('thutu');
            $table->text('link');

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
        Schema::dropIfExists('mpquangcaosanphams');
    }
}

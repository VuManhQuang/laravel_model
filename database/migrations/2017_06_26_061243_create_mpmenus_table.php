<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpmenus', function (Blueprint $table) {
            $table->increments('id_menu');
            $table->string('ten_menu',15)->unique();
            $table->string('goiy_menu',50);
            $table->integer('parent_id');
            $table->text('url');
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
        Schema::dropIfExists('mpmenus');
    }
}

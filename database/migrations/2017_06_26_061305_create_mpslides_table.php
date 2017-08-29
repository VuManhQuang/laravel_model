<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpslidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpslides', function (Blueprint $table) {
                       $table->increments('id_slide');
            $table->string('ten_slide',255)->unique();
      
            $table->text('anh');
            $table->text('link');
  
            $table->integer('thutu_slide');
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
        Schema::dropIfExists('mpslides');
    }
}

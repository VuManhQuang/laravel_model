<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMptieudewebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mptieudewebs', function (Blueprint $table) {
                   $table->increments('id_tieude');
            $table->string('ten_tieude',255)->unique();
            $table->string('key',255);
            $table->text('noidung_tieude');
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
        Schema::dropIfExists('mptieudewebs');
    }
}

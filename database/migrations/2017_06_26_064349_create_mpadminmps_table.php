<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpadminmpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpadminmps', function (Blueprint $table) {
               $table->increments('id_admin');
            $table->string('username',255)->unique();
            $table->string('password',100);
            $table->string('name',100);
            $table->string('email',255);
            $table->string('phone',13);
            $table->string('diachi',255);
         
            $table->rememberToken();
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
        Schema::dropIfExists('mpadminmps');
    }
}

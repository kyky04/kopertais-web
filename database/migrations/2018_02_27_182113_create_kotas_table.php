<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKotasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kotas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_provinsi')->unsigned();
            $table->string('nama');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_provinsi')->references('id')->on('provinsis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kotas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUniversitasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universitas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kota')->unsigned();
            $table->string('nama');
            $table->double('latidude');
            $table->double('longitude');
            $table->integer('jarak');
            $table->integer('biaya_inap');
            $table->integer('biaya_konsumsi');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_kota')->references('id')->on('kotas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('universitas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRekomendasisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekomendasis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_univ')->unsigned();
            $table->string('tanggal_berangkat');
            $table->string('tanggal_kembali');
            $table->integer('lama_pejalanan');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_user')->references('id')->on('pegawais');
            $table->foreign('id_univ')->references('id')->on('universitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rekomendasis');
    }
}

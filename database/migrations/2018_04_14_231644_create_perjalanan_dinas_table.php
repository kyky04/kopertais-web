<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePerjalananDinasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perjalanan_dinas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('pangkat');
            $table->string('jabatan');
            $table->string('maksud_perjalanan');
            $table->string('kendaraan');
            $table->string('tempat_berangkat');
            $table->string('tempat_tujuan');
            $table->integer('lama_perjalanan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('perjalanan_dinas');
    }
}

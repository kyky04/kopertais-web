<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePerjalanansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perjalanans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_universitas')->unsigned();
            $table->date('waktu');
            $table->integer('status_keuangan');
            $table->integer('status_bendahara');
            $table->string('nama');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_universitas')->references('id')->on('universitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('perjalanans');
    }
}

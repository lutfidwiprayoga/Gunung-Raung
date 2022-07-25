<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisatawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisatawans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('perjalanan_id')->nullable();
            $table->integer('kebangsaan_id')->nullable();
            $table->integer('tanggal_id');
            $table->date('tanggal_turun');
            $table->string('jenis_identitas');
            $table->string('nomor_identitas');
            $table->string('nama');
            $table->string('email');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('provinsi')->nullable();
            $table->string('asal_kota')->nullable();
            $table->string('pekerjaan');
            $table->string('foto_identitas');
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
        Schema::dropIfExists('wisatawans');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->integer('ketua_id')->nullable();
            $table->string('kode_pesanan')->nullable();
            $table->datetime('tanggal_pesan');
            $table->datetime('maksimal_pembayaran');
            $table->string('status_guide')->nullable();
            $table->string('status_pemesanan')->nullable();
            $table->integer('biaya_tiket')->nullable();
            $table->integer('biaya_guide')->nullable();
            $table->integer('total_harga')->nullable();
            $table->integer('jumlah_tiket');
            $table->string('upload_bukti')->nullable();
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
        Schema::dropIfExists('pesanans');
    }
}

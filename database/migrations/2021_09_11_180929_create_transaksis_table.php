<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user');
            $table->char('kode_transaksi', 155);
            $table->bigInteger('no_hp');
            $table->text('alamat');
            $table->double('longitude');
            $table->double('latitude');
            $table->dateTime('jam_booking');
            $table->dateTime('tgl_booking');
            $table->enum('bentuk_pembayaran', ['dp','lunas']);
            $table->enum('status_transaksi', ['Diterima','Diproses','Selesai','Ditolak','Menunggu Konfirmasi','Menunggu Pembayaran','Menunggu Pembayaran Pertama','Menunggu Pelunasan']);
            $table->double('biaya_tambahan');
            $table->double('total_diskon');
            $table->double('total_transaksi');
            $table->text('catatan');
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
        Schema::dropIfExists('transaksis');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_transaksi');
            $table->integer('id_user');
            $table->enum('status', ['dp1','dp2','lunas']);
            $table->double('total_bayar');
            $table->double('total_lunas');
            $table->text('bukti_transfer');
            $table->integer('transfer_id');
            $table->char('atasnama_pengirim', 255);
            $table->char('bank_pengirim',255);
            $table->date('tgl_transfer');
            $table->text('catatan');
            $table->char('kode_transaksi');
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
        Schema::dropIfExists('riwayat_pembayarans');
    }
}
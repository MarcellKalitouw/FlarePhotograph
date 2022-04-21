<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user');
            $table->bigInteger('id_produk');
            $table->bigInteger('id_transaksi');
            $table->bigInteger('id_satuan');
            $table->bigInteger('id_warna');
            $table->bigInteger('harga');
            $table->bigInteger('qty');
            $table->double('diskon');
            $table->double('total');
            $table->enum('status',['Dalam Keranjang', 'Diproses', 'Selesai', 'Ditolak', 'Dalam Pesanan', 'Diterima', 'Menunggu Pembayaran', 'Menunggu Pelunasan']);
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
        Schema::dropIfExists('detail_transaksis');
    }
}
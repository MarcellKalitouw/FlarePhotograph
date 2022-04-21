<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk', 100);
            $table->text('deskripsi');
            $table->text('kegiatan');
            $table->enum('status', ['tersedia', 'tidak_tersedia']);
            $table->enum('studio', ['true', 'false']);
            $table->enum('isMultiple',['TRUE','FALSE']);
            $table->enum('isVariant',['TRUE','FALSE']);
            $table->bigInteger('harga');
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
        Schema::dropIfExists('produks');
    }
}
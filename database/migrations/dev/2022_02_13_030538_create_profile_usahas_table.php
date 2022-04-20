<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileUsahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_usahas', function (Blueprint $table) {
            $table->id();
            $table->char('nama_usaha', 50);
            $table->text('gambar_usaha');
            $table->text('deskripsi_usaha');
            $table->text('alamat_lengkap');
            $table->double('long');
            $table->double('lat');
            $table->softDeletes();
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
        Schema::dropIfExists('profile_usahas');
    }
}
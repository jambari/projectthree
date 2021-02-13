<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->integer('usia');
            $table->enum('satuan_usia', ['bulan', 'tahun']);
            $table->string('pekerjaan')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->unsignedBigInteger('penyakit_id');
            $table->timestamps();
            $table->foreign('penyakit_id')->references('id')->on('penyakits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
}

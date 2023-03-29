<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftarakads', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->uuid('nama_penghulu');
            $table->timestamps();
            $table->string('nama_calon_suami');
            $table->string('no_ktp_suami');
            $table->string('tempat_lahir_suami');
            $table->date('tanggal_lahir_suami');
            $table->string('alamat_suami');
            $table->string('pekerjaan_suami');
            $table->string('status_suami');
            $table->string('foto_suami');      
            $table->string('nama_calon_istri');
            $table->string('no_ktp_istri');
            $table->string('tempat_lahir_istri');
            $table->date('tanggal_lahir_istri');
            $table->string('alamat_istri');
            $table->string('pekerjaan_istri');
            $table->string('status_istri');
            $table->string('foto_istri');
            $table->foreign('nama_penghulu')->references('id')->on('penghulus')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal_akad_nikah');
            $table->time('waktu_akad_nikah');
            $table->string('mahar_pernikahan');
            $table->string('tempat_akad');
            $table->string('status');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftarakads');
    }
};

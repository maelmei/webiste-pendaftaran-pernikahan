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
        Schema::create('penghulus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->string('nama_penghulu');
            $table->string('gol_jabatan');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('alamat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penghulus');
    }
};

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
        Schema::create('panwascam', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('nik')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('nomor_sk')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('agama')->nullable();
            $table->string('disabilitas')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('pengalaman_kepemiluan')->nullable();
            $table->string('tahun');
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
        Schema::dropIfExists('panwascam');
    }
};

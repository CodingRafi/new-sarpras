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
        Schema::create('usulan_bangunans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id');
            $table->enum('jenis', ['ruang_kelas', 'ruang_praktek', 'laboratorium', 'perpustakaan', 'toilet', 'ruang_pimpinan',])->nullable();
            $table->foreignId('kompeten_id')->nullable();
            $table->foreignId('jenis_pimpinan_id')->nullable();
            $table->foreignId('laboratorium_id')->nullable();
            $table->string('jml_ruang');
            $table->string('luas_lahan');
            $table->string('proposal');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('usulan_bangunans');
    }
};

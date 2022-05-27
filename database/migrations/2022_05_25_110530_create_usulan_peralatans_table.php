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
        Schema::create('usulan_peralatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id');
            $table->foreignId('kompeten_id');
            $table->foreignId('peralatan_id')->nullable();
            $table->string('nama_peralatan')->nullable();
            $table->enum('kategori', ['utama', 'pendukung']);
            $table->string('jml');
            $table->string('proposal');
            $table->string('keterangan');
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
        Schema::dropIfExists('usulan_peralatans');
    }
};

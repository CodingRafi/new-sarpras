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
        Schema::create('ketersediaan_lahans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id');
            $table->string('nama');
            $table->string('no_sertifikat');
            $table->string('panjang');
            $table->string('lebar');
            $table->string('luas');
            $table->string('alamat');
            $table->enum('jenis_kepemilikan', ['sewa', 'hgb', 'shm', 'hibah', 'tanah_desa']);
            $table->string('keterangan');
            $table->string('bukti_lahan');
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
        Schema::dropIfExists('ketersediaan_lahans');
    }
};

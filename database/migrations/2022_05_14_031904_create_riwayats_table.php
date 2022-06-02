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
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id');
            $table->string('tahun_bantuan');
            $table->string('jenis');
            $table->string('pemberian_bantuan');
            $table->enum('sumber_anggaran', ['apbn', 'apbd', 'lain']);
            $table->string('nilai_bantuan');
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
        Schema::dropIfExists('riwayats');
    }
};

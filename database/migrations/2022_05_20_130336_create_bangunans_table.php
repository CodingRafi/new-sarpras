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
        Schema::create('bangunans', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['ruang_kelas', 'ruang_praktek', 'lab_komputer', 'perpustakaan', 'toilet', 'ruang_pimpinan'])->nullable();
            $table->foreignId('profil_id');
            $table->string('kondisi_ideal');
            $table->string('ketersediaan');
            $table->string('kekurangan');
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
        Schema::dropIfExists('bangunans');
    }
};

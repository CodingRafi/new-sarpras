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
            $table->enum('jenis', ['ruang_kelas', 'lab', 'perpustakaan', 'toilet', 'ruang_pimpinan',]);
            $table->foreignId('profil_id');
            $table->string('kondisi_ideal');
            $table->string('ketersediaan');
            $table->string('kekurangan');
            // $table->string('ket_kondisi_ideal')->nullable();
            // $table->string('ket_ketersediaan')->nullable();
            // $table->string('ket_kekurangan')->nullable();
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

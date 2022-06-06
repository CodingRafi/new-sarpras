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
        Schema::create('hasil_visitasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visitasi_id');
            $table->foreignId('unsur_verifikasi_id');
            $table->enum('hasil', ['belum_layak', 'layak', 'sangat_layak'])->nullable();
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
        Schema::dropIfExists('hasil_visitasis');
    }
};

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
        Schema::create('kekurangan_lahans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id');
            $table->string('nama');
            $table->string('panjang');
            $table->string('lebar');
            $table->string('luas');
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
        Schema::dropIfExists('kekurangan_lahans');
    }
};

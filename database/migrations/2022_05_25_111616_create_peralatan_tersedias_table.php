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
        Schema::create('peralatan_tersedias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kompeten_id');
            $table->foreignId('profil_id');
            $table->foreignId('peralatan_id');
            $table->string('nama');
            $table->string('kategori');
            $table->string('katersediaan');
            $table->string('kekurangan');
            $table->string('status');
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
        Schema::dropIfExists('peralatan_tersedias');
    }
};

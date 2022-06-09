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
        Schema::create('laboratoria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_laboratorium_id');
            $table->foreignId('profil_id');
            $table->string('ketersediaan');
            $table->string('kekurangan');
            $table->string('kondisi_ideal');
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
        Schema::dropIfExists('laboratoria');
    }
};

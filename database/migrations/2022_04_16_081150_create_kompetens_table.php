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
        Schema::create('kompetens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id');
            $table->foreignId('komli_id');
            $table->string('jml_lk');
            $table->string('jml_pr');
            $table->string('logo')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('kondisi_ideal_ruang');
            $table->string('kondisi_ideal_lahan');
            $table->string('ketersediaan');
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
        Schema::dropIfExists('kompetens');
    }
};

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
        Schema::create('komputers', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('komputers');
    }
};

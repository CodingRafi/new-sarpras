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
        Schema::create('kompeten_depos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_depo_id');
            $table->string('bidang')->nullable();
            $table->string('program')->nullable();
            $table->string('kompetensi')->nullable();
            $table->string('jml_lk')->nullable();
            $table->string('jml_pr')->nullable();
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
        Schema::dropIfExists('kompeten_depos');
    }
};

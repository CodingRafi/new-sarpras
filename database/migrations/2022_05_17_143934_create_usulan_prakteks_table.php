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
        Schema::create('usulan_prakteks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id');
            $table->foreignId('kompeten_id');
            $table->string('jml_ruang');
            $table->string('luas');
            $table->string('proposal');
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
        Schema::dropIfExists('usulan_prakteks');
    }
};

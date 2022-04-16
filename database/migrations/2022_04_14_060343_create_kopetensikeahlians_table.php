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
        Schema::create('kopetensikeahlians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id');
            $table->foreignId('kompeten_id');
            $table->integer('jml_lk');
            $table->integer('jml_pr');
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
        Schema::dropIfExists('kopetensikeahlians');
    }
};

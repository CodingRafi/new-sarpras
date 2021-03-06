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
        Schema::create('komlis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bidang_kompetensi_id');
            $table->foreignId('program_kompetensi_id');
            $table->foreignId('spektrum_id');
            $table->string('kompetensi');
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
        Schema::dropIfExists('komlis');
    }
};

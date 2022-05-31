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
        Schema::create('usulan_koleksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usulan_bangunan_id')->nullable();
            $table->foreignId('rehab_renov_id')->nullable();
            $table->foreignId('riwayat_id')->nullable();
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
        Schema::dropIfExists('usulan_koleksis');
    }
};

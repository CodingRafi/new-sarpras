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
        Schema::create('rehab_renovs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id');
            $table->enum('jenis', ['ruang_kelas', 'ruang_praktek', 'lab_komputer', 'perpustakaan', 'toilet', 'kantor', 'ruang_guru']);
            $table->string('persentase');
            $table->string('usia');
            $table->string('objek');
            $table->string('luas_lahan');
            $table->string('proposal');
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
        Schema::dropIfExists('rehab_renovs');
    }
};

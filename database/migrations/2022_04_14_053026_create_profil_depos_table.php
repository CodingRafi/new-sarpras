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
        Schema::create('profil_depos', function (Blueprint $table) {
            $table->id();
            $table->string('depo_npsn');
            $table->string('depo_sekolah_id');
            $table->string('depo_nama');
            $table->string('depo_status_sekolah');
            $table->string('depo_alamat');
            $table->string('depo_provinsi');
            $table->string('depo_kabupaten');
            $table->string('depo_kecamatan');
            $table->string('depo_email')->nullable();
            $table->string('depo_website')->nullable();
            $table->string('depo_nomor_telepon')->nullable();
            $table->string('depo_nomor_fax')->nullable();
            $table->string('depo_bidang')->nullable();
            $table->string('depo_program')->nullable();
            $table->string('depo_jurusan')->nullable();
            $table->string('depo_akreditas')->nullable();
            $table->string('depo_jml_siswa');
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
        Schema::dropIfExists('profil_depos');
    }
};

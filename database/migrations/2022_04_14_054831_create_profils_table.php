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
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_depo_id');
            $table->string('npsn');
            $table->string('sekolah_id');
            $table->string('nama');
            $table->string('status_sekolah');
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('nomor_fax')->nullable();
            $table->string('akreditas')->nullable();
            $table->string('jml_siswa_l');
            $table->string('jml_siswa_p');
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('jml_rombel')->nullable();
            $table->string('nama_kepala_sekolah')->nullable();
            $table->string('gtk')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
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
        Schema::dropIfExists('profils');
    }
};

<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $profils = Profil::DataProfilSekolah();
            foreach($profils as $profil){
                Profil::create([
                    'depo_npsn' => $profil["npsn"],
                    'depo_sekolah_id' => $profil["sekolah_id"],
                    'depo_nama' => $profil["nama"],
                    'depo_status_sekolah' => $profil["status_sekolah"],
                    'depo_alamat' => $profil["alamat"],
                    'depo_provinsi' => $profil["provinsi"],
                    'depo_kabupaten' => $profil["kabupaten"],
                    'depo_kecamatan' => $profil["kecamatan"],
                    'depo_email' => $profil["email"],
                    'depo_website' => $profil["website"],
                    'depo_nomor_telepon' => $profil["nomor_telepon"],
                    'depo_nomor_fax' => $profil["nomor_fax"],
                    'depo_akreditas' => $profil['akreditasi'],
                    'depo_kepala_sekolah' => 'Bapak Rudi',
                    'depo_jml_siswa' => $profil['jml_siswa'],
                    'depo_bidang' => $profil['bidang'],
                    'depo_program' => $profil['program'],
                    'depo_jurusan' => $profil['jurusan'],
                ]);
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

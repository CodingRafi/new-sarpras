<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'view_users',
            'add_users',
            'edit_users',
            'delete_users',

            'view_roles',
            'add_roles',
            'edit_roles',

            'view_kcds',
            'add_kcds',
            'edit_kcds',
            'delete_kcds',

            'view_profil_kcds',
            'add_profil_kcds',
            'edit_profil_kcds',
            'delete_profil_kcds',

            'view_kota_kabupatens',
            'add_kota_kabupatens',
            'edit_kota_kabupatens',
            'delete_kota_kabupatens',

            'view_profils',
            'add_profils',
            'edit_profils',
            'delete_profils',

            'view_koleksis',
            'add_koleksis',
            'edit_koleksis',
            'delete_koleksis',

            'view_fotos',
            'add_fotos',
            'edit_fotos',
            'delete_fotos',

            'view_jenis_koleksis',
            'add_jenis_koleksis',
            'edit_jenis_koleksis',
            'delete_jenis_koleksis',

            'view_kompetens',
            'add_kompetens',
            'edit_kompetens',
            'delete_kompetens',

            'view_komlis',
            'add_komlis',
            'edit_komlis',
            'delete_komlis',

            'view_logs',
            'add_logs',
            'edit_logs',
            'delete_logs',

            'view_bidang_kompetensis',
            'add_bidang_kompetensis',
            'edit_bidang_kompetensis',
            'delete_bidang_kompetensis',

            'view_program_kompetensis',
            'add_program_kompetensis',
            'edit_program_kompetensis',
            'delete_program_kompetensis',

            'view_spektrums',
            'add_spektrums',
            'edit_spektrums',
            'delete_spektrums',

            'view_usulan_bangunans',
            'add_usulan_bangunans',
            'edit_usulan_bangunans',
            'delete_usulan_bangunans',
            'usulan_bangunan_edit_pimpinan',
            'usulan_bangunan_update_pimpinan',

            'view_bangunans',
            'add_bangunans',
            'edit_bangunans',
            'delete_bangunans',
            'ubah_ketersediaan',
            'ubah_kekurangan',
            'kondisi_ideal',
            'bangunan',

            'view_ketersediaan_lahan',
            'add_ketersediaan_lahan',
            'edit_ketersediaan_lahan',
            'delete_ketersediaan_lahan',

            'view_kekurangan_lahan',
            'add_kekurangan_lahan',
            'edit_kekurangan_lahan',
            'delete_kekurangan_lahan',

            'view_lahan',

            'view_peralatan',
            'add_peralatan',
            'edit_peralatan',
            'delete_peralatan',

            'view_riwayats',
            'add_riwayats',
            'edit_riwayats',
            'delete_riwayats',
            'riwayats_show_dinas',

            'view_monev',
            'add_monev',
            'edit_monev',
            'delete_monev',

            'view_visitasi',
            'add_visitasi',
            'edit_visitasi',
            'delete_visitasi',

            'view_profiladmin',

            'view_jenis_pimpinan',
            'add_jenis_pimpinan',
            'edit_jenis_pimpinan',
            'delete_jenis_pimpinan',

            'view_komputer',
            'add_komputer',
            'edit_komputer',
            'delete_komputer',
            'komputer_create_usulan',

            'view_peralatan_tersedia',
            'add_peralatan_tersedia',
            'edit_peralatan_tersedia',
            'delete_peralatan_tersedia',

            'view_perpustakaan',
            'add_perpustakaan',
            'edit_perpustakaan',
            'delete_perpustakaan',
            'perpustakaan_create_usulan',

            'view_pimpinan',
            'add_pimpinan',
            'edit_pimpinan',
            'delete_pimpinan',
            'pimpinan_create_usulan',
            'pimpinan_show_dinas',

            'view_toilet',
            'add_toilet',
            'edit_toilet',
            'delete_toilet',
            'toilet_create_usulan',

            'view_unsur_verifikasi',
            'add_unsur_verifikasi',
            'edit_unsur_verifikasi',
            'delete_unsur_verifikasi',

            'view_rehab_renov',
            'add_rehab_renov',
            'edit_rehab_renov',
            'delete_rehab_renov',
            'rehab_renov_create_usulan',
            'rehab_renov_show_dinas',

            'view_usulan_foto',
            'add_usulan_foto',
            'edit_usulan_foto',
            'delete_usulan_foto',
            'foto_sigle_delete',
            'foto_sigle_delete_rehab',

            'view_usulan_koleksi',
            'add_usulan_koleksi',
            'edit_usulan_koleksi',
            'delete_usulan_koleksi',

            'view_usulan_peralatan',
            'add_usulan_peralatan',
            'edit_usulan_peralatan',
            'delete_usulan_peralatan',

            'view_kelas',
            'add_kelas',
            'edit_kelas',
            'delete_kelas',
            'kelas_create_usulan',

            'view_praktik',
            'add_praktik',
            'edit_praktik',
            'delete_praktik',
            'praktik_create_usulan',
            'praktik_show_dinas',

            'view_usulan_lahan',
            'add_usulan_lahan',
            'edit_usulan_lahan',
            'delete_usulan_lahan',
            'usulan_lahan_dinas',

            'view_profil_search',
            'all_visitasi',
            'visitasi_publish',

            'view_laboratorium',
            'add_laboratorium',
            'edit_laboratorium',
            'delete_laboratorium',
            'laboratorium_create_usulan',

            'view_jenis_laboratorium',
            'add_jenis_laboratorium',
            'edit_jenis_laboratorium',
            'delete_jenis_laboratorium',

            'view_jenis_laboratorium_komlis',
            'add_jenis_laboratorium_komlis',
            'edit_jenis_laboratorium_komlis',
            'delete_jenis_laboratorium_komlis',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
       }
    }
}

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

            'view_profiladmin',

            'view_profil',
            'edit_profil',

            'view_lahan',
            'show_dinas_lahan',
            
            'view_usulan_lahan',
            'add_usulan_lahan',
            'edit_usulan_lahan',
            'delete_usulan_lahan',
            'show_dinas_usulan_lahan',
            'update_dinas_usulan_lahan',

            'view_koleksi',
            'add_koleksi',
            'edit_koleksi',
            'delete_koleksi',
            
            'view_bangunan',
            'add_bangunan',
            'edit_bangunan',
            'delete_bangunan',

            'view_usulan_bangunan',
            'add_usulan_bangunan',
            'edit_usulan_bangunan',
            'delete_usulan_bangunan',
            'show_dinas_usulan_bangunan',
            'update_dinas_usulan_bangunan',

            'view_kcd',
            'add_kcd',
            'edit_kcd',
            'delete_kcd',

            'view_jenis_pimpinan',
            'add_jenis_pimpinan',
            'edit_jenis_pimpinan',
            'delete_jenis_pimpinan',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
       }
    }
}

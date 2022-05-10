<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ProfilDepo;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Dinas',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $role = Role::create([
            'name' => 'dinas',
            'guard_name' => 'web'
        ]);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $admin->assignRole([$role->id]);


        //? Membuat role sekolah 
        $roleTeacher = Role::create([
            'name' => 'sekolah',
            'guard_name' => 'web'
        ]);

        $izinSekolahs = ['1', '9', '10', '11', '12', '13', '14', '15'];
        $resultSekolah = array_map(function($izinSekolah){
            return $izinSekolah;
        }, $izinSekolahs);

        $roleTeacher->syncPermissions($resultSekolah);


        //? Membuat Role KCD
        $roleKcd = Role::create([
            'name' => 'kcd',
            'guard_name' => 'web'
        ]);

        $izinKcds = ['9', '13'];

        $resultKcd = array_map(function($izinKcd){
            return $izinKcd;
        },$izinKcds);

        $roleKcd->syncPermissions($resultKcd);


        //? Membuat Role pengawas
        $rolePengawas = Role::create([
            'name' => 'pengawas',
            'guard_name' => 'web'
        ]);

        $izinPengawases = ['9', '13'];

        $resultPengawas = array_map(function($izinPengawas){
            return $izinPengawas;
        }, $izinPengawases);

        $rolePengawas->syncPermissions($resultPengawas);


        //? membuat Role Verifikator
        $roleVerifikator = Role::create([
            'name' => 'verifikator',
            'guard_name' => 'web'
        ]);

        $izinVerifikators = ['9', '13'];

        $resultVerifikator = array_map(function($izinVerifikator){
            return $izinVerifikator;
        }, $izinVerifikators);

        $roleVerifikator->syncPermissions($resultVerifikator);



        // $user->assignRole('student');


        //? Membuat user sekolah
        $profils = ProfilDepo::all();
        foreach ($profils as $key => $profil) {
            User::create([
                'name' => $profil['depo_nama'],
                'npsn' => $profil["depo_npsn"],
                'password' => bcrypt('12345678')
            ]);
        }

    }
}

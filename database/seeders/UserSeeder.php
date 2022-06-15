<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kcd;
use App\Models\ProfilDepo;
use App\Models\Profil;
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
            'name' => 'Dinas Pendidikan',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('*123456*'),
            'foto_profil' => '/img/logo_navbar.png'
        ]);

        $role = Role::create([
            'name' => 'dinas',
            'guard_name' => 'web'
        ]);

        $permissions = ['1', '2', '3', '4', '5', '6', '7', '8','9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '24', '28', '36', '40', '41', '42', '43', '48', '49', '50', '51', '52', '53', '54', '55', '56', '57','58', '59', '60', '66', '83', '84', '85', '86', '91', '92','96', '97', '98', '99', '100', '101', '102', '103', '104', '124', '130', '131', '132', '133', '139', '150', '164', '169', '170', '165', '178', '179', '180', '181', '182', '183', '184', '185'];

        $role->syncPermissions($permissions);

        $admin->assignRole([$role->id]);


        //? Membuat role sekolah 
        $roleSekolah = Role::create([
            'name' => 'sekolah',
            'guard_name' => 'web'
        ]);

        $izinSekolahs = ['20', '22', '24', '25', '26', '27', '28', '29', '30', '31', '36', '37', '38','39', '60', '61', '62', '63', '64', '65', '66', '68', '70', '71', '72', '75', '76', '77', '79', '80', '81', '82', '87', '88', '89', '90', '105', '109', '111', '112', '113', '114', '118', '120', '121', '122', '123', '125', '129', '134', '135', '136', '137', '138', '144', '145', '151', '152', '153', '154', '158', '159', '160', '161', '162', '163', '166', '167', '168', '73', '171', '96', '173', '174', '175', '176', '177'];
        $resultSekolah = array_map(function($izinSekolah){
            return $izinSekolah;
        }, $izinSekolahs);

        $roleSekolah->syncPermissions($resultSekolah);


        //? Membuat Role KCD
        $roleKcd = Role::create([
            'name' => 'kcd',
            'guard_name' => 'web'
        ]);

        $izinKcds = ['1', '20', '24', '28', '36', '60', '66', '91', '100', '139', '150', '164', '169', '170', '165'];

        $resultKcd = array_map(function($izinKcd){
            return $izinKcd;
        },$izinKcds);

        $roleKcd->syncPermissions($resultKcd);


        //? Membuat Role pengawas
        $rolePengawas = Role::create([
            'name' => 'pengawas',
            'guard_name' => 'web'
        ]);

        $izinPengawases =['1', '20', '24', '28', '36', '60', '66', '91', '100', '139', '150', '164', '169', '170', '165'];

        $resultPengawas = array_map(function($izinPengawas){
            return $izinPengawas;
        }, $izinPengawases);

        $rolePengawas->syncPermissions($resultPengawas);


        //? membuat Role Verifikator
        $roleVerifikator = Role::create([
            'name' => 'verifikator',
            'guard_name' => 'web'
        ]);

        $izinVerifikators =['1', '20', '24', '28', '36', '60', '66', '91', '100', '139', '150', '164', '169', '170', '96', '171', '172', '165', '187', '188'];

        $resultVerifikator = array_map(function($izinVerifikator){
            return $izinVerifikator;
        }, $izinVerifikators);

        $roleVerifikator->syncPermissions($resultVerifikator);



        // $user->assignRole('student');


        //? Membuat user sekolah
        $profils = Profil::all();
        foreach ($profils as $key => $profil) {
            $user = User::create([
                'profil_id' => $profil['id'],
                'name' => $profil['nama'],
                'npsn' => $profil["npsn"],
                'password' => bcrypt('*123456*'),
                'email' => $profil['email'],
                'foto_profil' => '/img/logo_navbar.png'
            ]);
            $user->assignRole('sekolah');
        }

        //? Membuat user kcd
        $kcds = Kcd::all();
        foreach ($kcds as $ke => $kcd) {
            $user = User::create([
                'kcd_id' => $kcd->id,
                'name' => $kcd->nama,
                'foto_profil' => '/img/logo_navbar.png'
            ]);
            $user->assignRole('kcd');
        }

    }
}

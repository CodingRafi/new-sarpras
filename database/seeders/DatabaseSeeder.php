<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ProfilDepoSeeder::class);
        // $this->call(KompetenDepoSeeder::class);
        $this->call(ProgramKompetensiSeeder::class);
        $this->call(BidangKompetensiSeeder::class);
        $this->call(ProfilSeeder::class);
        $this->call(KcdSeeder::class);
        $this->call(ProfilKcdSeeder::class);
        $this->call(BangunanSeeder::class);
        $this->call(JeniskoleksiSeeder::class);
        // $this->call(KomliSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(UserSeeder::class);
    }
}

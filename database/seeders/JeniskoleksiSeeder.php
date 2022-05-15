<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JeniskoleksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jeniskoleksis')->insert([
            'nama' => 'tampak_depan'
        ]);
        DB::table('jeniskoleksis')->insert([
            'nama' => 'tampak_kanan'
        ]);
        DB::table('jeniskoleksis')->insert([
            'nama' => 'tampak_kiri'
        ]);
        DB::table('jeniskoleksis')->insert([
            'nama' => 'tampak_dalam'
        ]);
        DB::table('jeniskoleksis')->insert([
            'nama' => 'lain'
        ]);
    }
}

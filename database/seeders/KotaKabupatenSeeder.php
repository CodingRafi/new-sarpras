<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KotaKabupaten;

class KotaKabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kotas = ['kab. Bandung', 'kab. Bandung Barat', 'kab. Bekasi', 'kab. Bogor', 'kab. Ciamis', 'kab. Cianjur', 'kab. Cirebon', 'kab. Garut', 'kab. Indramayu', 'kab. Karawang', 'kab. Kuningan', 'kab. Majalengka', 'kab. Pangandaran', 'kab. Purwakarta', 'kab. Subang', 'kab. Sukabumi', 'kab. Sumedang', 'kab. Tasikmalaya', 'Kota Bandung', 'Kota Banjar', 'Kota Bekasi', 'Kota Bogor', 'Kota Cimahi', 'Kota Cirebon', 'Kota Depok', 'Kota Sukabumi', 'Kota Tasikmalaya'];

        foreach ($kotas as $key => $kota) {
            KotaKabupaten::create([
                'nama' => $kota
            ]);
        }
    }
}



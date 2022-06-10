<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\usulanBangunan;
use App\Models\usulanLahan;
use App\Models\usulanPeralatan;
use App\Models\RehabRenov;
use App\Models\KekuranganLahan;
use App\Models\PeralatanTersedia;
use DB;

class Profil extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function profildepo(){
        return $this->belongsTo(ProfilDepo::class);
    }

    public function kcd(){
        return $this->belongsTo(Kcd::class);
    }

    public function kompeten(){
        return $this->hasMany(Kompeten::class);
    }

    public function logo(){
        return $this->hasMany(Logo::class);
    }

    public function log(){
        return $this->hasMany(Log::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bangunan(){
        return $this->hasMany(Bangunan::class);
    }

    public function kotaKabupaten(){
        return $this->belongsTo(KotaKabupaten::class);
    }

    public function usulanBangunan(){
        return $this->hasMany(UsulanBangunan::class);
    }

    public function pimpinan(){
        return $this->hasMany(Pimpinan::class);
    }

    public function praktik(){
        return $this->hasMany(Praktik::class);
    }

    public function profilKcd(){
        return $this->hasMany(ProfilKcd::class);
    }

    public function usulanLahan(){
        return $this->hasMany(UsulanLahan::class);
    }

    public function rehab(){
        return $this->hasMany(RehabRenov::class);
    }

    public function peralatanTersedia(){
        return $this->hasMany(peralatanTersedia::class);
    }

    public function usulanPeralatan(){
        return $this->hasMany(UsulanPeralatan::class);
    }

    public function visitasi(){
        return $this->hasMany(Visitasi::class);
    }

    public function kekuranganLahan(){
        return $this->hasMany(KekuranganLahan::class);
    }

    public function ketersediaanLahan(){
        return $this->hasMany(KetersediaanLahan::class);
    }

    public function laboratorium(){
        return $this->hasMany(Laboratorium::class);
    }


    public function scopeSearch($query, array $search)
    {
        // dd($query->where('npsn', 'like', '%' . $search['search'] . '%'));
        $query->when($search['search'] ?? false, function($query, $search){
            return $query->where('profils.npsn', 'like', '%' . $search . '%')
                        ->orWhere('profils.sekolah_id', 'like', '%' . $search . '%')
                        ->orWhere('profils.nama', 'like', '%' . $search . '%');
        });

        if(isset($search['filter'])){
            if($search['filter'] == 'kota'){
                return $query->orderBy('profils.kabupaten', 'asc');
            }
    
            if($search['filter'] == 'kcd'){
                return $query->orderBy('kcds.instansi', 'asc');
            }
        }

    }

    public static function createProfilSeeder($profil, $kota){
        Profil::create([
            'profil_depo_id' => $profil['id'],
            'kota_kabupaten_id' => $kota->id,
            'npsn' => $profil["depo_npsn"],
            'sekolah_id' => $profil["depo_sekolah_id"],
            'nama' => $profil["depo_nama"],
            'status_sekolah' => $profil["depo_status_sekolah"],
            'alamat' => $profil['depo_alamat'],
            'provinsi' => $profil['depo_provinsi'],
            'kabupaten' => $profil['depo_kabupaten'],
            'kecamatan' => $profil['depo_kecamatan'],
            'email' => $profil['depo_email'],
            'website' => $profil['depo_website'],
            'nomor_telepon' => $profil['depo_nomor_telepon'],
            'nomor_fax' => $profil['depo_nomor_fax'],
            'akreditas' => $profil['depo_akreditas'],
            'jml_siswa_l' => $profil['jml_lk'] ?? 0,
            'jml_siswa_p' => $profil['jml_lk'] ?? 0,
        ]);
    }

    public static function show_profil_admin($profils){
        $datas = [];
        
        $usulanLahan = 0;
        $usulanBangunan = 0;
        $usulanPeralatan = 0;

        foreach ($profils as $key => $profil) {
            $lahan = UsulanLahan::where('profil_id', $profil->id)->get();
            $bangunan = UsulanBangunan::where('profil_id', $profil->id)->get();
            $peralatan = UsulanPeralatan::where('profil_id', $profil->id)->get();

            $usulanLahan += count($lahan);
            $usulanBangunan += count($bangunan);
            $usulanPeralatan += count($peralatan);

            $datas[] = [
                'id' => $profil->id,
                'profil_depo_id' => $profil->profil_depo_id,
                'npsn' => $profil->npsn,
                'sekolah_id' => $profil->sekolah_id,
                'nama' => $profil->nama,
                'status_sekolah' => $profil->status_sekolah,
                'alamat' => $profil->alamat,
                'provinsi' => $profil->provinsi,
                'kabupaten' => $profil->kabupaten,
                'kecamatan' => $profil->kecamatan,
                'email' => $profil->email,
                'website' => $profil->website,
                'nomor_telepon' => $profil->nomor_telepon,
                'nomor_fax' => $profil->nomor_fax,
                'akreditas' => $profil->akreditas,
                'jml_siswa_l' => $profil->jml_siswa_l,
                'jml_siswa_p' => $profil->jml_siswa_p,
                'usulanLahan' => $lahan,
                'usulanBangunan' => $bangunan,
                'usulanPeralatan' => $peralatan,
                'instansi' => $profil->instansi,
                'rehab' => $profil->rehab,
                'status_lahan' => KekuranganLahan::status_kekurangan($profil),
                'status_peralatan' => Peralatan::status_dashboard_dinas($profil),
                'status_bangunan' => Bangunan::status_bangunan_dinas($profil)
            ];
        }

        return [$datas, $usulanLahan, $usulanBangunan, $usulanPeralatan];
    }
}

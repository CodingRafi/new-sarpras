<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function user(){
        return $this->belongsTo(Users::class);
    }

    public function profil(){
        return $this->belongsTo(Profil::class);
    }

    public static function createLog($profil_id, $user_id, $keterangan){
        Log::create([
            'profil_id' => $profil_id,
            'users_id' => $user_id,
            'keterangan' => $keterangan
        ]);
    }
}

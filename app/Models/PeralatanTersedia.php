<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeralatanTersedia extends Model
{
    use HasFactory;

    protected $guarded =[
        "id"
    ];

    public function kompeten(){
        return $this->belongsTo(Kompeten::class);
    }

    public static function deletePeralatan($data){
        PeralatanTersedia::destroy($data->id);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $primaryKey = 'idkota';
    protected $table = "kotas";
    public $timestamps=false;

    public function provinsis(){
        return $this->belongsTo("App\Models\Provinsi","provinsis_idprovinsi");
    }

    public function kemacatans(){
        return $this->hasMany("App\Models\Kecamatan","kecamatans","idkecamatan");
    }
}

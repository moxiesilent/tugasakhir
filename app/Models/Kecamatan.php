<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $primaryKey = 'idkecamatan';
    protected $table = "kecamatans";
    public $timestamps=false;

    public function kotas(){
        return $this->belongsTo("App\Models\Kota","kotas_idkota");
    }

    public function kelurahans(){
        return $this->hasMany("App\Models\Kelurahan","kelurahans_idkelurahan","idkelurahan");
    }
}

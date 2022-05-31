<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $primaryKey = 'idlisting';
    protected $table = "listings";
    // public $incrementing = false;

    public function agens(){
        return $this->belongsTo("App\Models\User","agen_idagen");
    }

    public function lantais(){
        return $this->belongsTo("App\Models\Lantai","jenis_lantai_idjenis_lantai");
    }

    public function surats(){
        return $this->belongsTo("App\Models\Surat","jenis_surat_idjenis_surat");
    }

    public function bentukHargas(){
        return $this->belongsTo("App\Models\Bentukharga","bentuk_harga_idbentuk_harga");
    }

    public function tipePropertis(){
        return $this->belongsTo("App\Models\Tipeproperti","tipe_properti_idtipe_properti");
    }

    public function tipeApartemens(){
        return $this->belongsTo("App\Models\Tipeapartemen","tipe_apartemens_idtipe_apartemen");
    }

    public function kelurahans(){
        return $this->belongsTo("App\Models\Kelurahan","kelurahans_idkelurahan");
    }

}

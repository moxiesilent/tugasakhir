<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $primaryKey = 'idlaporan';
    protected $table = "laporans";
    public $timestamps=false;

    public function listings(){
        return $this->belongsTo("App\Models\Listing","listings_idlisting");
    }

    public function agensPemilik(){
        return $this->belongsTo("App\Models\User","agens_pemilik");
    }

    public function agensPenjual(){
        return $this->belongsTo("App\Models\User","agens_penjual");
    }

}

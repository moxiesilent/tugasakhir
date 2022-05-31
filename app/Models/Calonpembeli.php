<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calonpembeli extends Model
{
    use HasFactory;
    protected $primaryKey = 'idpelanggan';
    protected $table = "calon_pembelis";
    public $timestamps=false;

    public function agens(){
        return $this->belongsTo("App\Models\User","agen_idagen");
    }
}

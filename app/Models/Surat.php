<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $primaryKey = 'idjenis_surat';
    protected $table = "jenis_surats";
    public $timestamps=false;

    public function listings(){
        return $this->hasMany("App\Models\Listing","jenis_surat_idjenis_surat","idjenis_surat");
    }
}

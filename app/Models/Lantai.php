<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lantai extends Model
{
    use HasFactory;
    protected $primaryKey = 'idjenis_lantai';
    protected $table = "jenis_lantais";
    public $timestamps=false;

    public function listings(){
        return $this->hasMany("App\Models\Listing","jenis_lantai_idjenis_lantai","idjenis_lantai");
    }
}

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
}

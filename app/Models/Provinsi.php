<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $primaryKey = 'idprovinsi';
    protected $table = "provinsis";
    public $timestamps=false;
}

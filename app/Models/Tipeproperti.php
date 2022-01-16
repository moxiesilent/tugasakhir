<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipeproperti extends Model
{
    use HasFactory;
    protected $primaryKey = 'idtipe_properti';
    protected $table = "tipe_propertis";
    public $timestamps=false;
}

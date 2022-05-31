<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Primaryfoto extends Model
{
    use HasFactory;
    protected $primaryKey = 'idfoto_primary';
    protected $table = "foto_primarys";
    public $timestamps=false;
}

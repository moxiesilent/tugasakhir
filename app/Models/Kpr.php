<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpr extends Model
{
    use HasFactory;
    protected $primaryKey = 'idkpr';
    protected $table = "kprs";
    public $timestamps=false;
}

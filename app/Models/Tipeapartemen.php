<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipeapartemen extends Model
{
    use HasFactory;
    protected $primaryKey = 'idtipe_apartemen';
    protected $table = "tipe_apartemens";
    public $timestamps=false;
}

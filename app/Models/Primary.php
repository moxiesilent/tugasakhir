<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Primary extends Model
{
    use HasFactory;
    protected $primaryKey = 'idprimary';
    protected $table = "primarys";
    public $timestamps=false;
}

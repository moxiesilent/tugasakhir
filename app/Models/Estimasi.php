<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimasi extends Model
{
    use HasFactory;
    protected $primaryKey = 'idestimasi';
    protected $table = "estimasis";
    public $timestamps=false;
}

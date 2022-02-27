<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    protected $primaryKey = 'idkelurahan';
    protected $table = "kelurahans";
    public $timestamps=false;

    public function listings(){
        return $this->hasMany("App\Models\Listing","kelurahans_idkelurahan","idkelurahan");
    }
}

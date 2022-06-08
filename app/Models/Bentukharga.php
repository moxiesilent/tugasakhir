<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bentukharga extends Model
{
    use HasFactory;
    protected $primaryKey = 'idbentuk_harga';
    protected $table = "bentuk_hargas";
    public $timestamps=false;

    public function listings(){
        return $this->hasMany(Listing::class);
    }
}

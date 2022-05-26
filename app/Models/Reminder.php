<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;
    protected $table = "reminders";
    protected $primaryKey = 'idreminder';
    public $timestamps=false;

    public function agens(){
        return $this->belongsTo("App\Models\User","agens_idagen");
    }

    public function primarys(){
        return $this->belongsTo("App\Models\Primary","primarys_idprimary");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objave extends Model
{
    use HasFactory;
    protected  $table = "objave";

    public function objavljivac(){
        return $this->belongsTo(Korisnici::class,"id_korisnik");
    }
}

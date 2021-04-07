<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Korisnici;

class OsnovniCtrl extends Controller
{
    protected $data = [];
    function __construct(){
        // Izvlacio bi iz baze sve podatke sto se tice navigacije, ali posto ima jako malo linkova mislim da je ovako bolje
        $this->data["navLinkovi"]=(object)[
            "link1" => ["naziv"=>"Home","ruta"=>"pocetna"],
            "link2" => ["naziv"=>"Moje objave","ruta"=>"mojeObjave"],
            "link3" => ["naziv"=>"Login","ruta"=>"login"],
            "link4" => ["naziv"=>"Register","ruta"=>"register"],
            "link5" => ["naziv"=>"Logout","ruta"=>"logout"],
        ];
        // Da bih tretirao ovaj asocijativni niz kao objekat, moram da ga pretvorim u json i vratim natrag....
        $this->data["navLinkovi"] = json_encode($this->data["navLinkovi"]);
        $this->data["navLinkovi"] = json_decode($this->data["navLinkovi"]);
        $this->data["postojeciKor"] = Korisnici::all();
    }
}

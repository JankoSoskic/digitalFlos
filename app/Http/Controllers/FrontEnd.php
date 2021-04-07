<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objave;
use App\Models\Korisnici;

class FrontEnd extends OsnovniCtrl
{

    public function homeStrana(){
        $this->data["greske"] = session("greske") == null ? [] :session("greske");
        $this->data["uspeh"] = session("uspeh") == null ? [] : session("uspeh");
        $this->data["korisnik"] = session("korisnik") == null ? [] : session("korisnik");
        session()->forget("greske");
        session()->forget("uspeh");
        $this->data["objave"] =[];
        if(session("korisnik") !=null){
            if(session("korisnik")[0]->id_uloge == 2){
                $this->data["objave"] = Objave::orderBy("pregledana")->get();
            }
            else{
                $this->data["objave"] = Objave::where("pregledana","=","1")->get();
            }
        }
        else{
            $this->data["objave"] = Objave::where("pregledana","=","1")->get();
        }
        return view("pages.home",$this->data);
    }


    public function registerStrana(){
        $this->data["greske"] = session("greske") == null ? [] :session("greske");
        $this->data["uspeh"] = session("uspeh") == null ? [] : session("uspeh");
        $this->data["korisnik"] = session("korisnik") == null ? [] : session("korisnik");
        session()->forget("greske");
        session()->forget("uspeh");
        if(count($this->data["korisnik"])==1){
            session(["greske"=>["vec ste ulogovani"]]);
            return redirect(route("pocetna"));
        }
        return view("pages.register",$this->data);
    }


    public function loginStrana(){
        $this->data["greske"] = session("greske") == null ? [] :session("greske");
        $this->data["uspeh"] = session("uspeh") == null ? [] : session("uspeh");
        $this->data["korisnik"] = session("korisnik") == null ? [] : session("korisnik");
        session()->forget("greske");
        session()->forget("uspeh");
        if(count($this->data["korisnik"])==1){
            session(["greske"=>["vec ste ulogovani"]]);
            return redirect(route("pocetna"));
        }
        return view("pages.login",$this->data);
    }

    public function mojeObjaveStrana(){
        $this->data["greske"] = session("greske") == null ? [] : session("greske");
        $this->data["uspeh"] = session("uspeh") == null ? [] : session("uspeh");
        $this->data["korisnik"] = session("korisnik") == null ? [] : session("korisnik");
        session()->forget("greske");
        session()->forget("uspeh");
        if(count($this->data["korisnik"])!=1){
            session(["greske"=>["niste ulogovani"]]);
            return redirect(route("pocetna"));
        }
        if(session("korisnik")[0]->id_uloge == 2){
            session(["greske"=>["Ne mozete pristupiti ovoj stranici"]]);
            return redirect(route("pocetna"));
        }
        $this->data["postoviOsobe"] = Objave::where("id_korisnik","=",session("korisnik")[0]->id)->with("objavljivac")->get();
        return view("pages.mojeObjave",$this->data);
    }

    public function jednaobjava($idObjave){
        $this->data["greske"] = session("greske") == null ? [] : session("greske");
        $this->data["uspeh"] = session("uspeh") == null ? [] : session("uspeh");
        $this->data["korisnik"] = session("korisnik") == null ? [] : session("korisnik");
        session()->forget("greske");
        session()->forget("uspeh");
        $this->data["taObjava"] = Objave::with("objavljivac")->find("$idObjave");
        return view("pages.objava",$this->data);
    }

    public function prepravkaObjave($idObjave){
        $this->data["greske"] = session("greske") == null ? [] : session("greske");
        $this->data["uspeh"] = session("uspeh") == null ? [] : session("uspeh");
        $this->data["korisnik"] = session("korisnik") == null ? [] : session("korisnik");
        session()->forget("greske");
        session()->forget("uspeh");
        $this->data["taObjava"] = Objave::with("objavljivac")->find("$idObjave");
        return view("pages.updateObjave",$this->data);
    }

    public function dohvatanjePodataka(Request $request){
        if($request->input("sta")=="Blogovi"){
            if(session("korisnik") !=null){
                    if(session("korisnik")[0]->id_uloge == 2){
                    $podaci = Objave::orderBy("pregledana")->with("objavljivac")->get();
                }
            }
            return json_encode($podaci);
        }
        elseif($request->input("sta")=="Korisnici"){
            if(session("korisnik") !=null){
                if(session("korisnik")[0]->id_uloge == 2){
                    $podaci = Korisnici::select("Ime","prezime","email")->get();
                }
            }
            return json_encode($podaci);
        }
        return "greska";
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrepravkaPostRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Korisnici;
use App\Models\Objave;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\NovBlogRequest;

class BackEnd extends Controller
{
    public function registracijaNovog(RegisterRequest $request){
        $greske = [];
        $proveraEmail = Korisnici::where("email","=",$request->input("email"))->get();
        if(count($proveraEmail) == 0){
            $novKorisnik = new Korisnici();
            $novKorisnik->Ime = $request->input("ime");
            $novKorisnik->prezime = $request->input("prezime");
            $novKorisnik->email = $request->input("email");
            $novKorisnik->password = md5($request->input("lozinka"));
            $novKorisnik->id_uloge= 1;
            $novKorisnik->save();
            session(["uspeh"=>["Uspesno je napravljen profil"]]);
            return redirect(route("login"));
        }
        else{
            array_push($greske,"Takav mail vec postoji u bazi podataka");
            session(["greske"=>$greske]);
            return redirect(route("register"));
        }
    }

    public function loginovanje(Request $request){
        $greske = [];
        $pronadjeniCovek = Korisnici::where([
            ["email","=",$request->input("email")],
            ["password","=",md5($request->input("lozinka"))]
        ])->get();
        if(count($pronadjeniCovek) != 1){
            array_push($greske,"Da li ste dobro upisali kredencijale ?");
            return redirect(route("login"));
        }
        else{
            session(["korisnik"=>$pronadjeniCovek]);
            session(["uspeh"=>["Uspesno ste se prijavili"]]);
        }
        return redirect(route("pocetna"));
    }

    public function logout(){
        if(session("korisnik")!=null){
            session()->forget("korisnik");
        }
        session(["uspeh"=>["Uspesno ste se odjavili"]]);
        return redirect(route("pocetna"));
    }

    public function kreiranjeNovogBloga(NovBlogRequest $request){
        $greske = [];
        if(count(session("korisnik")) == 1){
            $novBlog = new Objave();
            $novBlog->id_korisnik = session("korisnik")[0]->id;
            $novBlog->naslov = $request->input("naslov");
            $novBlog->text = $request->input("textArea");
            //premestanje slike pocetak
            $putanja = public_path("assets/images/slikeObjava/");
            $putSlikeKojiCeBiti = session("korisnik")[0]->id.time().".".$request->file("slika")->clientExtension();
            $request->file("slika")->move($putanja,$putSlikeKojiCeBiti);
            // premestanje slike kraj
            $novBlog->putanjaSlike = $putSlikeKojiCeBiti;
            $novBlog->save();
            session(["uspeh"=>["Uspesno ste napravili blog"]]);
        }
        else{
            array_push($greske,"doslo je do greske pokusajte kasnije");
        }
        return redirect(route("pocetna"));
    }

    public function brisanjeObjave(Request $request){
        $greske = [];
        if(session("korisnik")[0]->id_uloge == 2){
            $this->brisi($request->input("brisanje"));
        }
        else{
            $pronadjenjaObjava = Objave::where([
                "id"=>$request->input("brisanje"),
                "id_korisnik"=>session("korisnik")[0]->id
            ])->get();
            if(count($pronadjenjaObjava)==1){
                $this->brisi($request->input("brisanje"));
            }
        }
        array_push($greske,"Pokusaj brisanja tudjeg posta, greska");
        return redirect(route("pocetna"));
    }
    private function brisi($idZaBrisanje){
        $objavaZaBrisanje = Objave::find($idZaBrisanje);
        File::delete("assets/images/slikeObjava/".$objavaZaBrisanje->putanjaSlike);
        $objavaZaBrisanje->delete();
        session(["uspeh"=>["Uspesno ste obrisali post"]]);
        return redirect(route("pocetna"));
    }

    public function prepravkaObjave(PrepravkaPostRequest $request){
        $greske = [];
        $fajl = $request->file("slika");
        $validirano = true;
        if($fajl != null){
            $validirano = $this->validate($request,["slika"=>"required|image|mimes:jpeg,png,jpg|max:8048"]);
        }
        if($validirano){
            $pronadjenjaObjava = Objave::where([
                "id"=>$request->input("update"),
                "id_korisnik"=>session("korisnik")[0]->id
            ])->get();
            if(count($pronadjenjaObjava)==1){
                $pronadjenjaObjava[0]->naslov = $request->input("naslov");
                $pronadjenjaObjava[0]->text = $request->input("textArea");
                $pronadjenjaObjava[0]->pregledana = 0;
                if($fajl != null){
                    File::delete("assets/images/slikeObjava/".$pronadjenjaObjava[0]->putanjaSlike);
                    $putanja = public_path("assets/images/slikeObjava/");
                    $putSlikeKojiCeBiti = session("korisnik")[0]->id.time().".".$request->file("slika")->clientExtension();
                    $request->file("slika")->move($putanja,$putSlikeKojiCeBiti);
                    $pronadjenjaObjava[0]->putanjaSlike = $putSlikeKojiCeBiti;
                }
                $pronadjenjaObjava[0]->save();
                session(["uspeh"=>["Uspesno ste prepravili objavu"]]);
                return redirect(route("mojeObjave"));
            }
        }
        else{
            array_push($greske,"Izmena nije uspela");
        }
        return redirect(route("mojeObjave"));
    }

    public function odobriobjavu(Request $request){
        if(session("korisnik")[0]->id_uloge == 2){
            $zaMenjanje = Objave::find($request->input("idObjave"));
            $zaMenjanje->pregledana = 1;
            $zaMenjanje->save();
            return 1;
        }
        else{
            return 0;
        }
    }
    public function izbrisiObjavu(Request $request){
        $zaBrisanje = Objave::find($request->input("idObjave"));
        if(session("korisnik")[0]->id_uloge == 2){
            File::delete("assets/images/slikeObjava/".$zaBrisanje->putanjaSlike);
            $zaBrisanje->delete();
            return 1;
        }
        elseif(session("korisnik")[0]->id == $zaBrisanje->id_korisnik){
            File::delete("assets/images/slikeObjava/".$zaBrisanje->putanjaSlike);
            $zaBrisanje->delete();
            return 1;
        }
        else{
            return 0;
        }
    }
}

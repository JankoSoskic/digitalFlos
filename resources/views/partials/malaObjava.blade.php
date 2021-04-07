<div class="col-12 d-flex dlex-row justify-content-between my-5 border rounded">
    <div class="col-3">
        <a href="{{route("jednaobjava",$jedna->id)}}"><img src="{{asset("assets/images/slikeObjava/".$jedna->putanjaSlike)}}" alt="{{$jedna->naslov}}" class="img-fluid"/></a>
    </div>
    <div class="col-9 d-flex flex-row justify-content-around my-auto">
        <h4>{{$jedna->objavljivac->Ime ." ". $jedna->objavljivac->prezime}}</h4>
        <a href="{{route("jednaobjava",$jedna->id)}}"><h4>{{$jedna->naslov}}</h4></a>
        @if(count($korisnik) != 0)
            @if($korisnik[0]->id_uloge==2 || $jedna->id_korisnik == $korisnik[0]->id)
                <div class="d-flex flex-row justify-content-around ">
                    @if($korisnik[0]->id_uloge!=2)
                        <a href="{{route("prepravkaObjave",$jedna->id)}}" class="mx-2"><button class="btn btn-warning">Prepravi objavu</button></a>
                    @endif
                    @if($korisnik[0]->id_uloge == 2 && $jedna->pregledana != 1)
                        <a href="#" id="odobriObjavu" dataAttr="{{$jedna->id}}" onclick="odobriObjavu(this)" class="mx-2"><button class="btn btn-success">Odobri objavu</button></a>
                    @endif
                        <a href="#" id="izbrisiObjavu" dataAttr="{{$jedna->id}}" onclick="izbrisiObjavu(this)" class="mx-2"><button class="btn btn-danger ">Izbrisi objavu</button></a>
                </div>
            @endif
        @endif
    </div>
</div>

@extends("layouts.mainLayout")
@section("title") Moje objave @endsection
@section("keywords") @endsection
@section("desc") @endsection
@section("content")

    <div class="col-12 d-flex flex-column justify-content-around my-3">
        <div class="col-12 text-center">
            <h3 class="my-2">{{$taObjava->objavljivac->Ime ." ". $taObjava->objavljivac->prezime}}</h3>
            <h3 class="my-2">{{$taObjava->naslov}}</h3>
        </div>
        <div class="col-12 text-center">
            <img src="{{asset("assets/images/slikeObjava/".$taObjava->putanjaSlike)}}" class="img-fluid my-2" alt="naslov"/>
        </div>
        <div class="col-8 mx-auto">
            <p class="text-center">{{$taObjava->text}}</p>
        </div>
    </div>
    @if(count($korisnik) != 0)
        @if($korisnik[0]->id_uloge==2 || $taObjava->id_korisnik == $korisnik[0]->id)
        <div class="col-6 mx-auto d-flex flex-row justify-content-around my-3">
            @if($korisnik[0]->id_uloge!=2)
                <a href="{{route("prepravkaObjave",$taObjava->id)}}"><button class="btn btn-warning">Prepravi objavu</button></a>
            @endif
                @if($korisnik[0]->id_uloge == 2 && $taObjava->pregledana != 1)
                    <a href="#" id="odobriObjavu" dataAttr="{{$taObjava->id}}" onclick="odobriObjavu(this)" class="mx-2"><button class="btn btn-success">Odobri objavu</button></a>
                @endif
            <form action="{{route("brisanjeObjave")}}" method="post">
                @csrf
                @method("delete")
                <button type="submit" value="{{$taObjava->id}}" name="brisanje" class="btn btn-danger">Izbrisi objavu</button>
            </form>
        </div>
        @endif
    @endif
@endsection


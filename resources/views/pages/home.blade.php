@extends("layouts.mainLayout")
@section("title") Pocetna strana @endsection
@section("keywords") @endsection
@section("desc") @endsection
@section("content")



    <div class="text-center">
        <h1 id="pr" class="text-center">Blogovi</h1>
        @if(count($korisnik) != 0)
            @if($korisnik[0]->id_uloge == 2)
                <small>sortirano po ne odobrenim</small>
            @endif
        @endif
    </div>
    <div class="container mt-5 " id="content">
        <div class="row bg-white">
            @if(count($objave) == 0)
                <h4 class="text-center">Izgleda da nema nijedne objave</h4>
            @else
                @foreach($objave as $jedna)
                    @include("partials.malaObjava")
                @endforeach
            @endif
        </div>
    </div>
@endsection

@extends("layouts.mainLayout")
@section("title") Moje objave @endsection
@section("keywords") @endsection
@section("desc") @endsection
@section("content")
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Napravite novi blog</h2>
                <form action="{{route("novBlog")}}" method="post" onsubmit="return proveraUnosaNovaObjava()" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-4">
                        <label for="naslov">Naslov</label>
                        <input type="text" class="form-control" name="naslov" id="naslov" placeholder="Naslov...">
                        <p class="nema text-danger text-center">Mora imati bar 2 reci</p>
                    </div>
                    <div class="form-group my-4">
                        <div class="form-group">
                            <label for="slika">Unesite sliku</label>
                            <input type="file" class="form-control-file" name="slika" id="slika" required>
                        </div>
                    </div>
                    <div class="form-group my-4 col-12">
                        <textarea id="textArea" name="textArea" placeholder="Opis bloga..." class="form-control my-2 lockFromMoving" rows="4"></textarea>
                        <p class="nema text-danger text-center">Mora postojati bar 15 karaktera</p>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <button type="submit" class="btn btn-primary ">Napravi</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row bg-white">
            <div class="col-12">
                <div class="col-12 text-center">
                    <h2>Vaši blogovi</h2>
                    <small>i ne odobreni se prikazuju</small>
                </div>
                @if(count($postoviOsobe)==0)
                    <h4 class="text-center my-5">Izgleda da nemate jos uvek ni jednu objavu</h4>
                @endif
                @foreach($postoviOsobe as $jedna)
                    @include("partials.malaObjava")
                @endforeach
            </div>
        </div>
    </div>
@endsection


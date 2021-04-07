@extends("layouts.mainLayout")
@section("title") Izmena objave @endsection
@section("keywords") @endsection
@section("desc") @endsection
@section("content")
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Prepravite blog</h2>
                <form action="{{route("promenaObjave")}}" method="post" onsubmit="return proveraUnosaNovaObjava()" enctype="multipart/form-data">
                    @csrf
                    @method("patch")
                    <div class="form-group my-4">
                        <label for="naslov">Naslov</label>
                        <input type="text" class="form-control" name="naslov" id="naslov" value="{{$taObjava->naslov}}" placeholder="Naslov...">
                        <p class="nema text-danger text-center">Mora imati bar 2 reci</p>
                    </div>
                    <div class="form-group my-4">
                        <div class="form-group">
                            <label for="slika">Unesite sliku</label>
                            <input type="file" class="form-control-file" name="slika" id="slika">
                        </div>
                        <div class="col-12 text-center">
                            <img src="{{asset("assets/images/slikeObjava/".$taObjava->putanjaSlike)}}" class="img-fluid my-2" alt="naslov"/>
                            <p>trenutna slika</p>
                        </div>
                    </div>
                    <div class="form-group my-4 col-12">
                        <textarea id="textArea" name="textArea" placeholder="Opis bloga..." class="form-control my-2 lockFromMoving" rows="4">{{$taObjava->text}}</textarea>
                        <p class="nema text-danger text-center">Mora postojati bar 15 karaktera</p>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <button value="{{$taObjava->id}}" name="update" type="submit" class="btn btn-primary ">Prepravi</button>
                </form>
            </div>
        </div>
    </div>

@endsection


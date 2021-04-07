@extends("layouts.mainLayout")
@section("title") Login @endsection
@section("keywords") @endsection
@section("desc") @endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- pisem atribute -->
                <form action="{{route("loginovanje")}}" method="get" onsubmit="return proveraUnosaLog()">
                    @csrf
                    <div class="form-group my-4 d-flex flex-row flex-wrap justify-content-between">
                        <div class="col-8 mx-auto">
                            <label for="email">Email adresa</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="primer@gmail.com">
                            <p class="nema text-danger text-center">Email adresa mora biti @hotmail ili @gmail, i mora biti domen .com ili .rs</p>
                        </div>
                        <div class="col-8 mx-auto">
                            <label for="lozinka">Lozinka</label>
                            <input type="password" class="form-control" name="lozinka" id="lozinka" placeholder="Upšite lozinku...">
                            <p class="nema text-danger text-center">Lozinka mora sadrzati bar jedno veliko slovo i broj, mora sadrzati min 6 karaktera</p>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="col-12 d-flex flex-row justify-content-around">
                        <button name="dugme" type="submit" class="btn btn-primary col-4">Pošalji</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


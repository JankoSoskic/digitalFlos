<nav class="navbar navbar-expand-lg navbar-light bg-light bg-white">
    <a class="navbar-brand" href="{{route("pocetna")}}"><img src="{{asset("assets/images/logo.jpg")}}" class="img-fluid"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @foreach($navLinkovi as $jedan)
                @if(count($korisnik) != 0)
                    @if($jedan->naziv != "Register" && $jedan->naziv != "Login")
                        @if($korisnik[0]->id_uloge == 2 && $jedan->naziv == "Moje objave")
                            @continue
                        @else
                            <li class="nav-item active">
                                <a class="nav-link @if(request()->routeIs($jedan->ruta)) active @endif" href="{{route($jedan->ruta)}}">{{$jedan->naziv}}</a>
                            </li>
                        @endif
                    @endif

                @else
                    @if($jedan->naziv != "Logout" && $jedan->naziv != "Moje objave")
                        <li class="nav-item active">
                            <a class="nav-link @if(request()->routeIs($jedan->ruta)) active @endif" href="{{route($jedan->ruta)}}">{{$jedan->naziv}}</a>
                        </li>
                    @endif
                @endif
            @endforeach
                @if(count($korisnik) != 0 )
                    @if($korisnik[0]->id_uloge == 2)
                        <li>
                            <select class="form-control mx-2">
                                <option>Korisnici koji postoje</option>
                                @foreach($postojeciKor as $jedan)
                                    <option class="dropdown-item">{{$jedan->Ime ." ".$jedan->prezime}}</option>
                                @endforeach
                            </select>
                        </li>
                    @endif
                @endif
        </ul>
    </div>
</nav>

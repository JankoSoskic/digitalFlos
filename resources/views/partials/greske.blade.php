<div class="text-center text-danger">

    @if(count($greske) > 0)
        @foreach($greske as $jedna)
            <p>{{$jedna}}</p>
        @endforeach
    @endif
</div>
<div class="text-center text-success">
    @if(count($uspeh) > 0)
        @foreach($uspeh as $jedna)
            <p>{{$jedna}}</p>
        @endforeach
    @endif
</div>

@extends('layouts.frontend')

@section('content')
    <div class="row">
        @foreach ($packs as $pack)
        <div class="col-3 pb-3">
            <div class="card w-100">
                    <div class="card-header">
                    {{$pack->name}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">Price: {{$pack->price}} Coins</p>
                        <a href="{{url('packs/open/'.$pack->id)}}" class="btn btn-primary">Open</a>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
    {{ $packs->render() }}
@endsection
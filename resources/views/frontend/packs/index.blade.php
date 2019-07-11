@extends('layouts.frontend')

@section('content')
<h1>Packs</h1>
    <div class="row">
        @foreach (PackModel::all() as $pack)
        <div class="col-6">
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
@endsection
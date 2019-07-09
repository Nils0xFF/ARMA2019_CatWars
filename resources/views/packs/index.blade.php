
@extends('layouts.backend')

@section('content')

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($packs as $pack)
        <tr>
        <th scope="row">{{$pack->id}}</th>
        <td>{{$pack->name}}</td>
        <td>{{$pack->price}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
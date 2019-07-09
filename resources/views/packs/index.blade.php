
@extends('layouts.backend')

@section('content')

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($packs as $pack)
        <tr>
        <th scope="row">{{$pack->id}}</th>
        <td>{{$pack->name}}</td>
        <td>{{$pack->price}}</td>
        <td>
            <button type="button" class="btn btn-warning">Edit</button>
            <button type="button" class="btn btn-danger" (onClick)="delete({{$pack->id}})">Delete</button>
        </td>
        </tr>
        @endforeach
        <tr>
            <td><input type=""></td>
        </tr>
    </tbody>
</table>

@endsection
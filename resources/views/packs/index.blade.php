
@extends('layouts.backend')

@section('content')

@if($packs->count() > 0)
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($packs as $pack)
            <tr>
            <th scope="row">{{$pack->id}}</th>
            <td>{{$pack->name}}</td>
            <td>{{$pack->price}}</td>
            <td>
                <a type="button" class="btn btn-warning" href="{{ url('packs/edit/'.$pack->id) }}" >Edit</a>
                <a type="button" class="btn btn-danger" href="{{ url('packs/delete/'.$pack->id) }}" >Delete</a>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<a type="button" class="btn btn-primary btn-lg btn-block" href="{{ url('breeds/new') }}" >Add</a>
@else 
<a type="button" class="btn btn-primary btn-lg btn-block" href="{{ url('breeds/new') }}" >Add First Pack</a>
@endif


@endsection
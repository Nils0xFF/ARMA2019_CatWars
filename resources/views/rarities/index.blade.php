@extends('layouts.backend')

@section('content')

@if($rarities->count() > 0)
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Chance</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rarities as $rarity)
        <tr>
        <th scope="row">{{$rarity->id}}</th>
        <td>{{$rarity->name}}</td>
        <td>{{$rarity->chance}}</td>
        <td>
            <a type="button" class="btn btn-warning" href="{{ url('rarities/edit/'.$rarity->id) }}" >Edit</a>
            <a type="button" class="btn btn-danger" href="{{ url('rarities/delete/'.$rarity->id) }}" >Delete</a>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a type="button" class="btn btn-primary btn-lg btn-block" href="{{ url('breeds/new') }}" >Add</a>
@else 
<a type="button" class="btn btn-primary btn-lg btn-block" href="{{ url('breeds/new') }}" >Add First Rarity</a>
@endif
@endsection
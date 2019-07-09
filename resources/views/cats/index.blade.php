
@extends('layouts.backend')

@section('content')

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Current HP</th>
        <th scope="col">Breed ID</th>
        <th scope="col">Breed</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cats as $cat)
        <tr>
        <th scope="row">{{$cat->id}}</th>
        <td>{{$cat->current_hp}}</td>
        <td>{{$cat->breed->id}}</td>
        <td>{{$cat->breed->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
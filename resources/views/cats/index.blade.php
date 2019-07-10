
@extends('layouts.backend')

@section('content')

@if($cats->count() > 0)
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Current HP</th>
        <th scope="col">Breed</th>
        <th scope="col">User</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cats as $cat)
        <tr>
        <th scope="row">{{$cat->id}}</th>
        <td>{{$cat->current_hp}}</td>
        <td>{{$cat->breed->name}}</td>
        <td>{{$cat->user->name}}</td>
        <td>
            <a type="button" class="btn btn-warning" href="{{ url('cats/edit/'.$cat->id) }}" >Edit</a>
            <a type="button" class="btn btn-danger" href="{{ url('cats/delete/'.$cat->id) }}" >Delete</a>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a type="button" class="btn btn-primary btn-lg btn-block" href="{{ url('breeds/new') }}" >Add</a>
@else 
<a type="button" class="btn btn-primary btn-lg btn-block" href="{{ url('breeds/new') }}" >Add First Cat</a>
@endif

@endsection
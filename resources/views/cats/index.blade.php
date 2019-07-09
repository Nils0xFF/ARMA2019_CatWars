
@extends('layouts.backend')

@section('content')

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Current HP</th>
        <th scope="col">Breed</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cats as $cat)
        <tr>
        <th scope="row">{{$cat->id}}</th>
        <td>{{$cat->current_hp}}</td>
        <td>{{($breeds[$cat->breed_id])->name}}</td>
        <td>
            <button type="button" class="btn btn-warning">Edit</button>
            <button type="button" class="btn btn-danger">Delete</button>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
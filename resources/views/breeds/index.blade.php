
@extends('layouts.backend')

@section('rassen')

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Max. HP</th>
        <th scope="col">Cuteness</th>
        <th scope="col">Claw Sharpness</th>
        <th scope="col">Fur Thickness</th>
        <th scope="col">Claw Sharpness</th>
        <th scope="col">Rareness</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($breeds as $breed)
        <tr>
        <th scope="row">{{$breed->id}}</th>
        <td>{{$breed->name}}</td>
        <td>{{$breed->name}}</td>
        <td>{{$breed->name}}</td>
        <td>{{$breed->name}}</td>
        <td>{{$breed->name}}</td>
        <td>{{$breed->name}}</td>
        <td>{{$breed->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
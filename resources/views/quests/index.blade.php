@extends('layouts.backend')

@section('content')

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Chance</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rarities as $rarity)
        <tr>
        <th scope="row">{{$rarity->id}}</th>
        <td>{{$rarity->name}}</td>
        <td>{{$rarity->max_hp}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
@extends('layouts.backend')

@section('content')

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Duration</th>
        <th scope="col">Reward</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($quests as $quest)
        <tr>
        <th scope="row">{{$rarity->id}}</th>
        <td>{{$rarity->duration}}</td>
        <td>{{$rarity->reward}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
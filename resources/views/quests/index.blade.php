@extends('layouts.backend')

@section('content')

@if($quests->count() > 0)
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Duration</th>
        <th scope="col">Reward</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($quests as $quest)
        <tr>
        <th scope="row">{{$quest->id}}</th>
        <td>{{$quest->name}}</td>
        <td>{{$quest->duration}}</td>
        <td>{{$quest->reward}}</td>
        <td>
            <a type="button" class="btn btn-warning" href="{{ url('quests/edit/'.$quest->id) }}" >Edit</a>
            <a type="button" class="btn btn-danger" href="{{ url('quests/delete/'.$quest->id) }}" >Delete</a>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a type="button" class="btn btn-primary btn-lg btn-block" href="{{ url('breeds/new') }}" >Add</a>
@else 
<a type="button" class="btn btn-primary btn-lg btn-block" href="{{ url('breeds/new') }}" >Add First Quest</a>
@endif
@endsection
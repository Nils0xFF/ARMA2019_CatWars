@extends('layouts.backend')

@section('content')

@if($users->count() > 0)
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">E-Mail</th>
        <th scope="col">Coins</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->coins}}</td>
        <td>
            <a type="button" class="btn btn-warning" href="{{ url('admin/users/edit/'.$user->id) }}" >Edit</a>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@endsection
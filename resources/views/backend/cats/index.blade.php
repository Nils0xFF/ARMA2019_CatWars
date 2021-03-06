
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
            <a class="btn btn-secondary" href="{{ url('admin/cats/detail/'.$cat->id) }}" >Detail</a>
            <a class="btn btn-warning" href="{{ url('admin/cats/edit/'.$cat->id) }}" >Edit</a>
            <a class="btn btn-danger" href="{{ url('admin/cats/delete/'.$cat->id) }}" >Delete</a>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a class="btn btn-primary btn-lg btn-block" href="{{ url('admin/cats/new') }}" >Add</a>
{{ $cats->links() }}
@else 
<a class="btn btn-primary btn-lg btn-block" href="{{ url('admin/cats/new') }}" >Add First Cat</a>
@endif

@endsection
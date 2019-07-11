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
            <a type="button" class="btn btn-secondary" href="{{ url('admin/rarities/detail/'.$rarity->id) }}" >Detail</a>
            <a type="button" class="btn btn-warning" href="{{ url('admin/rarities/edit/'.$rarity->id) }}" >Edit</a>
            <a type="button" class="btn btn-danger" href="{{ url('admin/rarities/delete/'.$rarity->id) }}" >Delete</a>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $rarities->links() }}
<a type="button" class="btn btn-primary btn-lg btn-block" href="{{ url('admin/rarities/new') }}" >Add</a>
@else 
<a type="button" class="btn btn-primary btn-lg btn-block" href="{{ url('admin/rarities/new') }}" >Add First Rarity</a>
@endif
@endsection

@extends('layouts.backend')

@section('content')

@if($breeds->count() > 0)
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Max. HP</th>
            <th scope="col">Cuteness</th>
            <th scope="col">Fur Thickness</th>
            <th scope="col">Claw Sharpness</th>
            <th scope="col">Rareness</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($breeds as $breed)
            <tr>
            <th scope="row">{{$breed->id}}</th>
            <td>{{$breed->name}}</td>
            <td>{{$breed->max_hp}}</td>
            <td>{{$breed->cuteness}}</td>
            <td>{{$breed->fur_thickness}}</td>
            <td>{{$breed->claw_sharpness}}</td>
            <td>{{$breed->rarity->name}}</td>
            <td>
                <a type="button" class="btn btn-secondary" href="{{ url('admin/breeds/detail/'.$breed->id) }}" >Detail</a>
                <a type="button" class="btn btn-warning" href="{{ url('admin/breeds/edit/'.$breed->id) }}" >Edit</a>
                <a type="button" class="btn btn-danger" href="{{ url('admin/breeds/delete/'.$breed->id) }}" >Delete</a>
            </td>
            </tr>
            @endforeach

        </tbody>
    </table>
<a type="button" class="btn btn-primary btn-lg btn-block" href="{{ url('admin/breeds/new') }}" >Add</a>
@else 
<a type="button" class="btn btn-primary btn-lg btn-block" href="{{ url('admin/breeds/new') }}" >Add First Breed</a>
@endif

@endsection
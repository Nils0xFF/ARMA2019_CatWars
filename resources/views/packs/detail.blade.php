@extends('layouts.backend')

@section('content')

<h3>Pack</h3>
<h1>{{$pack->name}}</h1>
<div class="content">
    <table>
        <tbody>
            <tr>
                <th scope="row">ID:</th>
                <td>{{$pack->id}}</td>
            </tr>
            <tr>
                <th scope="row">created at:</th>
                <td>{{$pack->created_at}}</td>
            </tr>
            <tr>
                <th scope="row">updated at:</th>
                <td>{{$pack->updated_at}}</td>
            </tr>
            <tr>
                <th scope="row">price:</th>
                <td>{{$pack->price}}</td>
            </tr>
            <tr>
                <th scope="row">breeds:</th>
                <td>
                    @foreach($pack->breeds() as $breed)
                        {{$breed->name}}
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
    {{Form::open(['url' => 'admin/packs/addBreed/'.$pack->id])}}
    <div class="form-group">
        {{Form::label('breed', 'Breed')}}
        {{Form::select('breed_id', BreedModel::all()->pluck('name', 'id'), null,  ['class'=>'form-control'])}}
        @if ($errors->has('breed_id'))
            <span class="help-block">
                <strong>{{ $errors->first('breed_id')}}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        {{Form::submit('Add', ['class'=>'btn btn-primary'])}}
    </div>

</div>

@endsection
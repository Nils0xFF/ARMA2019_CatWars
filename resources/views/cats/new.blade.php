@extends('layouts.backend')

@section('content')

<h1>Add Cat</h1>

{{Form::open(['url' => 'admin/cats/new', 'files' => true])}}
<div class="form-group">
    {{Form::label('user_id', 'User')}}
    {{Form::select('user_id', UserModel::all()->pluck('name', 'id'), null,  ['class'=>'form-control'])}}
    @if ($errors->has('user_id'))
        <span class="help-block">
            <strong>{{ $errors->first('user_id')}}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{Form::label('breed_id', 'User')}}
    {{Form::select('breed_id', BreedModel::all()->pluck('name', 'id'), null,  ['class'=>'form-control'])}}
    @if ($errors->has('breed_id'))
        <span class="help-block">
            <strong>{{ $errors->first('breed_id')}}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{Form::label('image', 'User')}}
    {{Form::file('breed_id', BreedModel::all()->pluck('name', 'id'), null,  ['class'=>'form-control'])}}
    @if ($errors->has('breed_id'))
        <span class="help-block">
            <strong>{{ $errors->first('breed_id')}}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{Form::submit('Speichern', ['class'=>'btn btn-primary'])}}
</div>


{{Form::close()}}

@endsection
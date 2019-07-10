@extends('layouts.backend')

@section('content')

<h1>Edit Cat</h1>


{{Form::model($cat, ['url' => 'admin/cats/edit/'.$cat->id])}}
<div class="form-group">
    {{Form::label('current_hp', 'Current HP')}}
    {{Form::number('current_hp', null, ['class'=>'form-control'])}}
    @if ($errors->has('current_hp'))
        <span class="help-block">
            <strong>{{ $errors->first('current_hp')}}</strong>
        </span>
    @endif
</div>
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
    {{Form::label('breed_id', 'Breed')}}
    {{Form::select('breed_id', BreedModel::all()->pluck('name', 'id'), null,  ['class'=>'form-control'])}}
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
@extends('layouts.backend')

@section('content')

<h1>Edit Pack</h1>


{{Form::model($pack, ['url' => 'admin/packs/edit/'.$pack->id])}}
<div class="form-group">
    {{Form::label('name', 'Current HP')}}
    {{Form::text('name', null, ['class'=>'form-control'])}}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name')}}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{Form::label('price', 'Current HP')}}
    {{Form::number('price', null, ['class'=>'form-control'])}}
    @if ($errors->has('price'))
        <span class="help-block">
            <strong>{{ $errors->first('price')}}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{Form::submit('Speichern', ['class'=>'btn btn-primary'])}}
</div>


{{Form::close()}}

@endsection
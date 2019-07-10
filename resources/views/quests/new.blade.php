@extends('layouts.backend')

@section('content')

<h1>Add Quest</h1>

{{Form::open(['url' => 'admin/quests/new'])}}
<div class="form-group">
    {{Form::label('name', 'Name')}}
    {{Form::text('name', null, ['class'=>'form-control'])}}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name')}}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{Form::label('description', 'Description')}}
    {{Form::text('description', null, ['class'=>'form-control'])}}
    @if ($errors->has('description'))
        <span class="help-block">
            <strong>{{ $errors->first('description')}}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{Form::label('duration', 'Duration')}}
    {{Form::number('duration', null, ['class'=>'form-control'])}}
    @if ($errors->has('duration'))
        <span class="help-block">
            <strong>{{ $errors->first('duration')}}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{Form::label('reward', 'Reward')}}
    {{Form::number('reward', null, ['class'=>'form-control'])}}
    @if ($errors->has('reward'))
        <span class="help-block">
            <strong>{{ $errors->first('reward')}}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{Form::submit('Speichern', ['class'=>'btn btn-primary'])}}
</div>


{{Form::close()}}

@endsection
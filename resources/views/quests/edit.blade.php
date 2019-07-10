@extends('layouts.backend')

@section('content')

<h1>Edit Quest</h1>


{{Form::model($quest, ['url' => 'admin/quests/edit/'.$quest->id])}}
<div class="form-group">
    {{Form::label('name', 'Name')}}
    {{Form::text('name', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('description', 'Description')}}
    {{Form::text('description', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('duration', 'Duration')}}
    {{Form::number('duration', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('reward', 'Reward')}}
    {{Form::number('reward', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::submit('Speichern', ['class'=>'btn btn-primary'])}}
</div>


{{Form::close()}}

@endsection
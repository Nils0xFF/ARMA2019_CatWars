@extends('layouts.backend')

@section('content')

<h1>Edit User</h1>


{{Form::model($user, ['url' => 'users/edit/'.$user->id])}}
<div class="form-group">
    {{Form::label('name', 'Name')}}
    {{Form::text('name', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('coins', 'Coins')}}
    {{Form::number('coins', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::submit('Speichern', ['class'=>'btn btn-primary'])}}
</div>


{{Form::close()}}

@endsection
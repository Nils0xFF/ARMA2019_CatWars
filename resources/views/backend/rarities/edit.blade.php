@extends('layouts.backend')

@section('content')

<h1>Edit Rarity</h1>

{{Form::model($rarity, ['url' => 'admin/rarities/edit/'.$rarity->id])}}
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
    {{Form::label('chance', 'Chance')}}
    {{Form::number('chance', null, ['class'=>'form-control'])}}
    @if ($errors->has('chance'))
        <span class="help-block">
            <strong>{{ $errors->first('chance')}}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{Form::submit('Speichern', ['class'=>'btn btn-primary'])}}
</div>


{{Form::close()}}

@endsection
@extends('layouts.backend')

@section('content')

<h1>Add Breed</h1>

{{Form::open(['url' => 'admin/breeds/new'])}}
{{-- {{Form::model($breed, ['url' => 'breeds/edit/'.$breed->id])}} --}}
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
    {{Form::label('max_hp', 'Maximum HP')}}
    {{Form::number('max_hp', null, ['class'=>'form-control'])}}
    @if ($errors->has('max_hp'))
        <span class="help-block">
            <strong>{{ $errors->first('max_hp')}}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{Form::label('cuteness', 'Cuteness')}}
    {{Form::number('cuteness', null, ['class'=>'form-control'])}}
    @if ($errors->has('cuteness'))
        <span class="help-block">
            <strong>{{ $errors->first('cuteness')}}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{Form::label('fur_thickness', 'Fur Thickness')}}
    {{Form::number('fur_thickness', null, ['class'=>'form-control'])}}
    @if ($errors->has('fur_thickness'))
        <span class="help-block">
            <strong>{{ $errors->first('fur_thickness')}}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{Form::label('claw_sharpness', 'Claw Sharpness')}}
    {{Form::number('claw_sharpness', null, ['class'=>'form-control'])}}
    @if ($errors->has('claw_sharpness'))
        <span class="help-block">
            <strong>{{ $errors->first('claw_sharpness')}}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{Form::label('rarity_id', 'Rarity')}}
    {{Form::select('rarity_id', RarityModel::all()->pluck('name', 'id'), null,  ['class'=>'form-control'])}}
    @if ($errors->has('rarity_id'))
        <span class="help-block">
            <strong>{{ $errors->first('rarity_id')}}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{Form::submit('Speichern', ['class'=>'btn btn-primary'])}}
</div>


{{Form::close()}}

@endsection
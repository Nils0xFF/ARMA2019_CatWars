@extends('layouts.backend')

@section('content')

<h1>Edit Breed</h1>


{{-- {{Form::open(['url' => 'authors/new'])}} --}}
{{Form::model($breed, ['url' => 'breeds/edit/'.$breed->id])}}
<div class="form-group">
    {{Form::label('name', 'Name')}}
    {{Form::text('name', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('max_hp', 'Maximum HP')}}
    {{Form::text('max_hp', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('cuteness', 'Cuteness')}}
    {{Form::text('cuteness', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('fur_thickness', 'Fur Thickness')}}
    {{Form::text('fur_thickness', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('claw_sharpness', 'Claw Sharpness')}}
    {{Form::text('claw_sharpness', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('rarity_id', 'Rarity Id')}}
    {{Form::text('rarity_id', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::submit('Speichern', ['class'=>'btn btn-primary'])}}
</div>


{{Form::close()}}

@endsection
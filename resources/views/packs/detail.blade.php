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
                    <table>
                        <tbody>
                                @foreach ($pack->breeds as $breed)
                                <tr>
                                <td>{{$breed->name}}</td>
                                <td>
                                    <a type="button" class="btn btn-secondary" href="{{ url('admin/breeds/detail/'.$breed->id) }}" >Detail</a>
                                    <a type="button" class="btn btn-warning" href="{{ url('admin/breeds/edit/'.$breed->id) }}" >Edit</a>
                                    <a type="button" class="btn btn-danger" href="{{ url('admin/breeds/delete/'.$breed->id) }}" >Delete</a>
                                </td>
                                </tr>
                                @endforeach
                    
                            </tbody>
                        </table>
                </td>
            </tr>
        </tbody>
    </table>
    @if($selectableBreeds->count() > 0)
    {{Form::open(['url' => 'admin/packs/addBreed/'.$pack->id])}}
    <div class="form-group">
        {{Form::label('breed', 'Breed')}}
        {{Form::select('breed_id', $selectableBreeds, null,  ['class'=>'form-control'])}}
        @if ($errors->has('breed_id'))
            <span class="help-block">
                <strong>{{ $errors->first('breed_id')}}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        {{Form::submit('Add', ['class'=>'btn btn-primary'])}}
    </div>
    @endif

</div>

@endsection
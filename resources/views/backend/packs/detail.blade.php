@extends('layouts.backend')

@section('content')

<br>
<div class="jumbotron">

    <h3>Pack</h3>
    <h1>{{$pack->name}}</h1>

    <div id="content pt-5">
        <table class="table mt-5">
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
                    @if($pack->breeds->count() >0)
                    <th scope="row">Breeds:</th>
                    <td>
                        <table class="table">
                            <tbody>
                                @foreach ($pack->breeds as $breed)
                                <tr>
                                <td>{{$breed->name}}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ url('admin/breeds/detail/'.$breed->id) }}" >Detail</a>
                                    <a class="btn btn-danger" href="{{ url('admin/packs/removeBreed/'.$pack->id.'/'.$breed->id) }}" >Remove</a>
                                </td>
                                </tr>
                                @endforeach
                    
                            </tbody>
                        </table>
                    </td>
                    @else
                    <th scope="row">no Breeds</th>
                    @endif
                </tr>
            </tbody>
        </table><br><br>
        @if($selectableBreeds->count() > 0)
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    {{Form::open(['url' => 'admin/packs/addBreed/'.$pack->id])}}
                    <div class="form-group">
                        {{-- {{Form::label('breed', 'Breed')}} --}}
                        {{Form::select('breed_id', $selectableBreeds, null,  ['class'=>'form-control'])}}
                        @if ($errors->has('breed_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('breed_id')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        {{Form::submit('Add Breed', ['class'=>'btn btn-primary'])}}
                    </div>
                </div>
            </div>
        </div>
        @endif
        <br>
        <a class="btn btn-warning btn-lg btn-block" href="{{ url('admin/packs/edit/'.$pack->id) }}" >Edit</a>

    </div><!--content-->
</div><!--jumbotron-->
@endsection
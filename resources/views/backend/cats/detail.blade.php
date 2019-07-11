@extends('layouts.backend')

@section('content')

<br>
<div class="jumbotron">
    <h3>Cat</h3>
    <h1>{{$cat->breed->name}}</h1>

    <hr class="my-4">

    <div class="content">
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">ID:</th>
                    <td>{{$cat->id}}</td>
                </tr>
                <tr>
                    <th scope="row">created at:</th>
                    <td>{{$cat->created_at}}</td>
                </tr>
                <tr>
                    <th scope="row">updated at:</th>
                    <td>{{$cat->updated_at}}</td>
                </tr>
                <tr>
                    <th scope="row">current_hp:</th>
                    <td>{{$cat->current_hp}}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <a class="btn btn-warning btn-lg btn-block" href="{{ url('admin/cats/edit/'.$cat->id) }}" >Edit</a>
    </div>
</div><!--jumbotron-->

@endsection
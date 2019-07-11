@extends('layouts.backend')

@section('content')

<br>
<div class="jumbotron">
    <h3>User</h3>
    <h1>{{$user->name}}</h1>

    <hr class="my-4">

    <div class="content">
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">ID:</th>
                    <td>{{$user->id}}</td>
                </tr>
                <tr>
                    <th scope="row">created at:</th>
                    <td>{{$user->created_at}}</td>
                </tr>
                <tr>
                    <th scope="row">updated at:</th>
                    <td>{{$user->updated_at}}</td>
                </tr>
                <tr>
                    <th scope="row">coins:</th>
                    <td>{{$user->coins}}</td>
                </tr>
                <tr>
                    <th scope="row">email:</th>
                    <td>{{$user->email}}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <a type="button" class="btn btn-warning btn-lg btn-block" href="{{ url('admin/users/edit/'.$user->id) }}" >Edit</a>
    </div>
</div><!--jumbotron-->

@endsection
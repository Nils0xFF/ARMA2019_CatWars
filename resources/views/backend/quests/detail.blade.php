@extends('layouts.backend')

@section('content')

<br>
<div class="jumbotron">
    <h3>Quest</h3>
    <h1>{{$quest->name}}</h1>

    <hr class="my-4">

    <div class="content">
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">ID:</th>
                    <td>{{$quest->id}}</td>
                </tr>
                <tr>
                    <th scope="row">created at:</th>
                    <td>{{$quest->created_at}}</td>
                </tr>
                <tr>
                    <th scope="row">updated at:</th>
                    <td>{{$quest->updated_at}}</td>
                </tr>
                <tr>
                    <th scope="row">description:</th>
                    <td>{{$quest->current_hp}}</td>
                </tr>
                <tr>
                    <th scope="row">duration:</th>
                    <td>{{$quest->duration}}</td>
                </tr>
                <tr>
                    <th scope="row">reward:</th>
                    <td>{{$quest->reward}}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <a type="button" class="btn btn-warning btn-lg btn-block" href="{{ url('admin/quests/edit/'.$quest->id) }}" >Edit</a>
    </div>
</div><!--jumbotron-->

@endsection
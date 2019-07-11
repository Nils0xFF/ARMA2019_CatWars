@extends('layouts.backend')

@section('content')

<br>
<div class="jumbotron">
    <h3>Rarity</h3>
    <h1>{{$rarity->name}}</h1>

    <div class="content">
        <table class="table mt-4">
            <tbody>
                <tr>
                    <th scope="row">ID:</th>
                    <td>{{$rarity->id}}</td>
                </tr>
                <tr>
                    <th scope="row">created at:</th>
                    <td>{{$rarity->created_at}}</td>
                </tr>
                <tr>
                    <th scope="row">updated at:</th>
                    <td>{{$rarity->updated_at}}</td>
                </tr>
                <tr>
                    <th scope="row">chance:</th>
                    <td>{{$rarity->chance}}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <a class="btn btn-warning btn-lg btn-block" href="{{ url('admin/rarities/edit/'.$rarity->id) }}" >Edit</a>
    </div>
</div><!--jumbotron-->

@endsection
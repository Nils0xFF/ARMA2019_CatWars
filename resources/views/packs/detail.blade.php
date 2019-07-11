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
        </tbody>
    </table>
</div>

@endsection
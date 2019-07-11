@extends('layouts.backend')

@section('content')

<h3>User</h3>
<h1>{{$user->name}}</h1>
<div class="content">
    <table>
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
                <th scope="row">email:</th>
                <td>{{$user->email}}</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
@extends('layouts.backend')

@section('content')

<h3>Quest</h3>
<h1>{{$quest->name}}</h1>
<div class="content">
    <table>
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
</div>

@endsection
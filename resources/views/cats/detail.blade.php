@extends('layouts.backend')

@section('content')

<h3>Cat</h3>
<h1>{{$cat->breed->name}}</h1>
<div class="content">
    <table>
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
</div>

@endsection
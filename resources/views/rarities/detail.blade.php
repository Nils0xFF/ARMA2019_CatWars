@extends('layouts.backend')

@section('content')

<h3>Rarity</h3>
<h1>{{$rarity->name}}</h1>
<div class="content">
    <table>
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
</div>

@endsection
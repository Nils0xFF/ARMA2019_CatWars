@extends('layouts.backend')

@section('content')

<h3>Breed</h3>
<h1>{{$breed->name}}</h1>
<div class="content">
    <table>
        <tbody>
            <tr>
                <th scope="row">ID:</th>
                <td>{{$breed->id}}</td>
            </tr>
            <tr>
                <th scope="row">created at:</th>
                <td>{{$breed->created_at}}</td>
            </tr>
            <tr>
                <th scope="row">updated at:</th>
                <td>{{$breed->updated_at}}</td>
            </tr>
            <tr>
                <th scope="row">max_hp:</th>
                <td>{{$breed->max_hp}}</td>
            </tr>
            <tr>
                <th scope="row">fur_thickness:</th>
                <td>{{$breed->fur_thickness}}</td>
            </tr>
            <tr>
                <th scope="row">claw_sharpness:</th>
                <td>{{$breed->claw_sharpness}}</td>
            </tr>
            <tr>
                <th scope="row">cuteness:</th>
                <td>{{$breed->cuteness}}</td>
            </tr>
            <tr>
                <th scope="row">rarity:</th>
                <td>{{$breed->rarity->name}}</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
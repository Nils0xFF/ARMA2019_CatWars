@extends('layouts.backend')

@section('content')

<h1>Stats</h1>

@if($data)

    {{-- TOTAL --}}
    @if($data['total'])
    <hr>
    <h3>Total</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Model</th>
                <th scope="col">Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['total'] as $model => $number) 
            <tr>
            <th scope="row">{{$model}}</th>
            <td>{{$number}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    {{-- USERS --}}
    @if($data['users'])
    <hr>
    <h3>Users</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Model</th>
                <th scope="col">Average</th>
                <th scope="col">Maximum</th>
                <th scope="col">Minimum</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['users'] as $model => $values) 
            <tr>
            <th scope="row">{{$model}}</th>
            <td>{{$values[0]}}</td>
            <td>{{$values[1][0]}} ({{$values[1][1]}})</td>
            <td>{{$values[2][0]}} ({{$values[2][1]}})</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    {{-- BREEDS --}}
    @if($data['breeds'])
    <hr>
    <h3>Breeds</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Model</th>
                <th scope="col">Average</th>
                <th scope="col">Maximum</th>
                <th scope="col">Minimum</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['breeds'] as $model => $values) 
            <tr>
            <th scope="row">{{$model}}</th>
            <td>{{$values[0]}}</td>
            <td>{{$values[1][0]}} ({{$values[1][1]}})</td>
            <td>{{$values[2][0]}} ({{$values[2][1]}})</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    

@else 
<h4>No Data</h4>
@endif
@endsection
@extends('layouts.main')

@section('nav-links')
@auth
    <a class="nav-item nav-link" href="{{ url('Home') }}">Home</a>
    <a class="nav-item nav-link" href="{{ url('Home') }}">Packs</a>
    <a class="nav-item nav-link" href="{{ url('Home') }}">Quests</a>
    <a class="nav-item nav-link" href="{{ url('Home') }}">Collection</a>
@endauth
@role('admin')
    <a class="nav-item nav-link" href="{{ url('admin') }}">Admin</a>
@endrole
@endsection
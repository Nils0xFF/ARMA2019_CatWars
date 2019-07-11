@extends('layouts.main')

@section('nav-links')
@auth
    <a class="nav-item nav-link" href="{{ url('home') }}">Home</a>
    <a class="nav-item nav-link" href="{{ url('packs') }}">Packs</a>
    <a class="nav-item nav-link" href="{{ url('quests') }}">Quests</a>
    <a class="nav-item nav-link" href="{{ url('collection') }}">Collection</a>
    <a class="nav-item nav-link" href="{{ url('home') }}">Coins: {{ Auth::user()->coins }}</a>
@endauth
@role('admin')
    <a class="nav-item nav-link" href="{{ url('admin') }}">Admin</a>
@endrole
@endsection
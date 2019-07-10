@extends('layouts.main')

@section('nav-links')
<a class="nav-item nav-link" href="{{ url('admin/packs') }}">Packs</a>
<a class="nav-item nav-link" href="{{ url('admin/cats') }}">Cats</a>
<a class="nav-item nav-link" href="{{ url('admin/breeds') }}">Breeds</a>
<a class="nav-item nav-link" href="{{ url('admin/quests') }}">Quests</a>
<a class="nav-item nav-link" href="{{ url('admin/users') }}">Users</a>
<a class="nav-item nav-link" href="{{ url('admin/rarities') }}">Rarities</a>
@endsection
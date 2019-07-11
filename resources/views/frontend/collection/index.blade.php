@extends('layouts.frontend')

@section('content')
    <div class="row">
        @foreach (Auth::user()->cats as $cat)
            <div class="col-4 pb-3">
                @include('partials.cat', ['cat' => $cat])
            </div>
        @endforeach
    </div>
@endsection
@extends('layouts.frontend')

@section('content')
    <div class="row justify-content-center">
        @foreach ($cats as $cat)
            <div class="col-4">
                @include('partials.cat', ['cat' => $cat])
            </div>
        @endforeach
    </div>
@endsection
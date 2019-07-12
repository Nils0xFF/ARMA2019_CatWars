@extends('layouts.frontend')

@section('content')
    <div class="row">
        @foreach ($cats as $cat)
            <div class="col-6 col-md-4 pb-3">
                @include('partials.cat', ['cat' => $cat])
            </div>
        @endforeach
    </div>
    {{ $cats->render() }}


@endsection
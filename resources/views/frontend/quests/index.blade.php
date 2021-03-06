@extends('layouts.frontend')

@section('content')
    <div class="row">
        @foreach ($quests as $quest)
        <div class="col-6 pb-3">
            <div class="card h-100">
                <h5 class="card-header">{{$quest->name}}</h5>
                    <div class="card-body">
                        <p class="card-text">
                        {{$quest->description}}<br>
                        <div class="mt-5 pb-3">
                            <span class="float-left"><i class="oi oi-clock text-center"></i> {{$quest->duration}} Seconds</span>
                            <span class="float-right"><i class="oi oi-dollar text-center"></i> {{$quest->reward}} Coins</span>   
                        </div>
                        @if(in_array($quest->id, Auth::user()->quests->pluck('id')->toArray()))
                            <br>
                            <div class="quest-progress-wrapper progress" data-startTime="{{strtotime(Auth::user()->quests->find($quest->id)->pivot->created_at)}}" data-endTime="{{strtotime(Auth::user()->quests->find($quest->id)->pivot->created_at) + $quest->duration }}">
                                <div class="progress-bar progress-bar-striped progress-bar-animated quest-progress" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        @else
                        <br>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        @endif
                        </p>
                        <div class="text-center pt-3">
                        @if(!in_array($quest->id, Auth::user()->quests->pluck('id')->toArray()))
                            <a href="{{ url('quests/start/'.$quest->id) }}" class="btn btn-primary">Start Quest</a>
                        @else
                            <a href="{{ url('quests/complete/'.$quest->id) }}" class="btn btn-primary completeButton disabled">Complete Quest</a>
                        @endif
                        </div>
                    </div>
            </div>
        </div>

        @endforeach
    </div>
    {{ $quests->render() }}
    <script type="text/javascript" src="{{ URL::asset('js/questPage.js') }}"></script>
@endsection
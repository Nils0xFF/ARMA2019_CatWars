@extends('layouts.frontend')

@section('content')
    <div class="row">
        @foreach (QuestModel::all() as $quest)
        <div class="col-6">
            <div class="card">
                <h5 class="card-header">{{$quest->name}}</h5>
                    <div class="card-body">
                        <p class="card-text">
                        {{$quest->description}}<br>
                        Duration: {{$quest->duration}} <br>
                        Reward: {{$quest->duration}}
                        </p>
                        @if(!in_array($quest->id, Auth::user()->quests->pluck('id')->toArray()))
                            <a href="{{ url('quests/start/'.$quest->id) }}" class="btn btn-primary">Start Quest</a>
                        @else
                            <a href="{{ url('quests/complete/'.$quest->id) }}" class="btn btn-primary">Complete Quest</a>
                        @endif
                    </div>
            </div>
        </div>

        @endforeach
    </div>
@endsection
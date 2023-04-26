@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        Recent Activity Log
    </div>
    <div class="card-body">
        <ul class="list-group">
            @foreach ($recentActivity as $activity)
                <li class="list-group-item">
                    {{ $activity->user->name }} {{ $activity->activity }} at {{ $activity->created_at }}
                </li>
            @endforeach
        </ul>
    </div>
</div>

@endsection
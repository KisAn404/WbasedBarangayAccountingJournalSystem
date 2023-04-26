@extends('layouts.app')
@section('content')

    <div class="container"style="max-width: 100%;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Recent Activity</div>

                    <div class="card-body">
                        <ul>
                            @foreach ($recentActivity as $activity)
                                <li>{{ $activity->description }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
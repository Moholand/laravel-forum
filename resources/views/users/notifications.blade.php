@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Notification</div>

    <div class="card-body">
        <ul class="list-group">
            @foreach($notifications as $notification)
                <li class="list-group-item">
                    @if($notification->type === 'App\Notifications\NewReplyAdded')
                        new reply added to your discussion
                        <strong>{{ $notification->data['discussion']['title'] }}</strong>
                        <a href="{{ route('discussions.show', $notification->data['discussion']['slug']) }}" class="btn btn-sm btn-info float-right">
                            View Discussion
                        </a>
                    @endif

                    @if($notification->type === 'App\Notifications\ReplyMarkAsBest')
                        your reply to discussion <strong>{{ $notification->data['discussion']['title'] }}</strong> was mark as best reply
                        <a href="{{ route('discussions.show', $notification->data['discussion']['slug']) }}" class="btn btn-sm btn-info float-right">
                            View Discussion
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>

@endsection
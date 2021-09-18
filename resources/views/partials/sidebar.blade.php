<div class="col-md-4">
    @auth
        <a href="{{ route('discussions.create') }}" style="width: 100%; color: #ffffff" class="btn btn-info mb-3 shadow">
            Add Discussion
        </a>
    @else
        <a href="{{ route('login') }}" style="width: 100%; color: #ffffff" class="btn btn-info mb-3 shadow">
            Sign in for Add Discussion
        </a>
    @endauth

    <div class="card shadow">
        <div class="card-header">
            <a href="{{ route('channels.index') }}" class="font-weight-bold text-dark">Channels</a>
        </div>

        <div class="card-body">
            <ul class="list-group">
                @foreach($channels as $channel)
                    <li class="list-group-item">
                        <a href="{{ route('discussions.index') }}?channel={{$channel->slug}}">
                            {{$channel->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>